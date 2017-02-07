# Traits
## Content
- name (string 255)
- slug (slug 255, nullable, fields: name)
- title (string 255, nullable)
- resume (text, nullable)
- body (text, nullable)

## LogDate
- created (datetime)
- updated (datetime)

## Position
- position (int, nullable)

## Status
- status (int)

## Tree
- lft (int)
- lvl (int)
- rgt (int)

# Entities
## Page
### Fields
- Content (trait)
- LogDate (trait)
- Tree (trait)
- Status (trait)
- root (ManyToOne : WH\CmsBundle\Entity\Page)
- parent (ManyToOne : WH\CmsBundle\Entity\Page)
- children (OneToMany : WH\CmsBundle\Entity\Page)
- url (OneToOne : WH\SeoBundle\Entity\Url)
- metas (OneToOne : WH\SeoBundle\Entity\Metas)
- pageTemplateSlug (string 255, nullable)
- menus (text, nullable)

## Post
### Fields
- Content (trait)
- LogDate (trait)
- Status (trait)
- thumb (OneToOne : WH\MediaBundle\Entity\File)
- url (OneToOne : WH\SeoBundle\Entity\Url)
- metas (OneToOne : WH\SeoBundle\Entity\Metas)
- page (ManyToOne : WH\CmsBundle\Entity\Page)