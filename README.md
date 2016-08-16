#IM Extra Fields
**GetSimple plugin based on ItemManager 2**

IM Extra Fields is a GS plugin based on ItemManager 2.3.4 - ItemManager offers since version 2.3.4 new features, that simplify the usage the plugin in combination with GetSimple native pages. The IM-Extra-Fields plugin allows creation extra fields for native GS pages and is a kind of a mix between "I18N Custom Fields" and "Special Pages" plugins.

For instance, it allows you to create a bunch of categories with different fields and properties. These can then be selected by end-user within "page options" menu, depending upon need. Here is an example of how to extend a simple index page by ItemManager's file field:

![example](https://bigin.github.io/ghpages/images/imextrafields/imextra-pages-edit01.png)

The IM Extra Fields plugin has a very simple structure and should act more as an interface between ItemManager's and GetSimple's functionality. IM-Extra-Fields has scant functions of its own, does not stand alone and uses just the functionality of the ItemManager framework. 

**A little restriction in the Beta version:**

IM Extra Fields plugin does not support duplicates of the title, also not for items of the different categories. For example, when you create a new item within a "Test" category, let's say with a title "index". If you now edit your index page and assign it to a different category "ExtraPages" for example, than the "index" item of the "Test" category that you have created before will be deleted.

**Usage**
To get an item assigned to the current page just simple call: 
```php
$slug = get_page_slug(false);
$item = imanager()->getItem('name=Your category name', 'slug='.$slug);
```
where the first parameter is the category bane and the second an the curren page ID.

Of course, this can also be done by using any other attributes or fields, there is an example how you can do that by category ID:
```php
$slug = get_page_slug(false);
$item = imanager()->getItem(7, 'slug='.$slug);
// or alternative syntax:
$item = imanager()->getItem('id=7', 'slug='.$slug);
```
To output the item attributes just do:
```php
echo $item->name;
// or ID
echo $item->id;
// or label
echo $item->label;
// ...
```
The following attributes are available:
- id
- position
- name
- active
- label
- active
- created
- updated


If you have any further questions relating to IM Extra Fields you will find help in the ItemManager 2 Thread:

http://get-simple.info/forums/showthread.php?tid=7293

**Install Instructions:**

Requirements
`ItemManager 2.3.4` is required to get IM Extra Fields working


**Installing IM Extra Fields from the ZIP file**

Extract and upload the contents of the ZIP archive to your plugins folder.
Login to GetSimple admin and enable IM Extra Fields on the Plugins tab.

For more information see: http://ehret-studio.com/lab/2015/mai/itemmanager-2.0


