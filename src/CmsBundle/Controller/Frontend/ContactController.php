<?php

namespace CmsBundle\Controller\Frontend;

use CmsBundle\Form\Frontend\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WH\LibBundle\Entity\Status;

/**
 * Class ContactController
 *
 * @package CmsBundle\Controller\Frontend
 */
class ContactController extends Controller
{
    /**
     * @param         $id
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id, Request $request)
    {
        $em = $this->get('doctrine')->getManager();

        $pageRepository = $em->getRepository('CmsBundle:Page');
        $contactRepository = $em->getRepository('CmsBundle:Contact');

        $page = $pageRepository->get(
            'one',
            [
                'conditions' => [
                    'page.id'     => $id,
                    'page.status' => Status::$STATUS_PUBLISHED,
                ],
            ]
        );

        $contact = $contactRepository->get(
            'one',
            [
                'conditions' => [
                    'page.id'     => $id,
                    'page.status' => Status::$STATUS_PUBLISHED,
                ],
            ]
        );

        $pageTemplate = $page->getPageTemplateSlug();
        $pageTemplates = $this->getParameter('wh_cms_templates');
        $pageTemplate = $pageTemplates[$pageTemplate];

        $breadcrumb = $pageRepository->getPath($page);

        $renderVars = [
            'page'       => $page,
            'breadcrumb' => $breadcrumb,
        ];

        $form = $this->createForm(ContactFormType::class);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $contactForm = $form->getData();

            if ($form->isValid()) {
                $em = $this->get('doctrine')->getManager();

                $em->persist($contactForm);
                $em->flush();

                $htmlBody = $this->renderView(
                    '@Cms/Frontend/Email/contact-form.html.twig',
                    [
                        'contactForm' => $contactForm,
                    ]
                );

                $message = \Swift_Message::newInstance()
                    ->setSubject($this->getParameter('project_name') . ' - Demande de contact')
                    ->setFrom($contactForm->getEmail())
                    ->setTo($contact->getEmail())
                    ->setBody($htmlBody, 'text/html');

                if ($this->get('mailer')->send($message)) {
                    $renderVars['formSended'] = true;
                }
            }
        }

        $renderVars['form'] = $form->createView();

        return $this->render(
            $pageTemplate['frontView'],
            $renderVars
        );
    }

}
