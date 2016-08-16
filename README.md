#IM Extra Fields
**GetSimple plugin based on ItemManager 2**

IM Extra Fields is a GS plugin based on ItemManager 2.3.4 - ItemManager offers since version 2.3.4 new features, that simplify the usage the plugin in combination with GetSimple native pages. The IM-Extra-Fields plugin allows creation extra fields for native GS pages and is a kind of a mix between "I18N Custom Fields" and "Special Pages" plugins.

For instance, it allows you to create a bunch of categories with different fields and properties. These can then be selected by end-user within "page options" menu, depending upon need. Here is an example of how to extend a simple index page by ItemManager's file field:

![example](https://bigin.github.io/ghpages/images/imextrafields/imextra-pages-edit01.png)

The IM Extra Fields plugin has a very simple structure and should act more as an interface between ItemManager's and GetSimple's functionality. IM-Extra-Fields has scant functions of its own, does not stand alone and uses just the functionality of the ItemManager framework. 

**A little restriction in the Beta version:**

IM Extra Fields plugin does not support duplicates of the title, also not for items of the different categories. For example, when you create a new item within a "Test" category, let's say with a title "index". If you now edit your index page and assign it to a different category "ExtraPages" for example, than the "index" item of the "Test" category that you have created before will be deleted.

##Usage

To get an item assigned to the current page, just simple call: 
```php
$slug = get_page_slug(false);
$item = imanager()->getItem('name=Your category name', 'name='.$slug);
```
where the first parameter is the category name and the second the curren page ID.

Of course, this can also be done by using any other attributes or fields, there is an example how you can do that by category ID:
```php
$slug = get_page_slug(false);
$item = imanager()->getItem(7, 'name='.$slug);
// or alternative syntax:
$item = imanager()->getItem('id=7', 'name='.$slug);
```
To output an item `attribute` just do:
```php
echo $item->name;
// or ID
echo $item->id;
// or label
echo $item->label;
// ...
```
The following attributes are accessible:
- id
- position
- name
- active
- label
- active
- created
- updated

Outputing a `field value` of an item is a bit different, but works according to the same principle:
```php
echo $item->fields->fieldname->value;
```
where the `fieldname` is the field name of your added category fields.

> Note the following different syntax when you are working with special fields like `Image-` or `File Upload`.

To access the images or file field from your templates you can loop through the files field and output each file:

```php
foreach($item->fields->files->file_name as $key => $name) {
	echo '<img src="'.$item->fields->files->fullurl[$key].'">';
}
```
Or if you preffer, a shorter style just do:
```php
$files = $item->fields->files;
foreach($files->file_name as $key => $name) {
	echo '<img src="'.$files->fullurl[$key].'">';
}
```


where the `files` is the field name of your added file field and the `fullurl` an field attribute:

![colored code](https://bigin.github.io/ghpages/images/imextrafields/code-color_file_field.png)

Following `file`-field attributes are accessible:

- file_name (An array of the file names: `my_file.pdf`)
- path (An array of file paths without file names: `var/www/http/my_domain/data/uploads/imanager/2.20/`)
- fullpath (An array of the file paths: `var/www/http/my_domain/data/uploads/imanager/2.20/my_file.pdf`)
- url (An array of file URLs without file names: `data/uploads/imanager/2.20/`)
- fullurl (An array of file URLs: `data/uploads/imanager/2.20/my_file.pdf`)
- title (The file title)
- positions (File position)

Following `image`-field attributes are accessible:

- imagename (An array of the image names: `my_image.jpg`)
- imagepath (An array of image paths without file names: `var/www/http/my_domain/data/uploads/imanager/2.20/`)
- imagefullpath (An array of the image paths: `var/www/http/my_domain/data/uploads/imanager/2.20/my_image.jpg`)
- imageurl (An array of image URLs without file names: `data/uploads/imanager/2.20/`)
- imagefullurl (An array of image URLs: `data/uploads/imanager/2.20/my_image.jpg`)
- imagetitle (The image title)
- positions (Image position)

> Note: 
> The `image upload` field and `file upload` are practically identical. The file field allows you to configure which file extensions are allowed to upload. If you have a choice I then recommend you to use `file upload` rather than `image upload`.


If you have any further questions relating to IM Extra Fields you will find help in the ItemManager 2 Thread:

http://get-simple.info/forums/showthread.php?tid=7293

##Install Instructions:

**Requirements:**

`ItemManager 2.3.4` is required to get IM Extra Fields working


**Installing IM Extra Fields from the ZIP file**

Extract and upload the contents of the ZIP archive to your plugins folder.
Login to GetSimple admin and enable IM Extra Fields on the Plugins tab.

For more information see: http://ehret-studio.com/lab/2015/mai/itemmanager-2.0


