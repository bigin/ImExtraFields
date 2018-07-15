# IM Extra Fields   
**GetSimple plugin based on ItemManager 2**   

IM Extra Fields is a GS plugin based on [ItemManager 2.4.2](https://github.com/bigin/ItemManager_2.0) IM Extra Fields plugin allows to add new fields for GetSimple CMS pages and access them within your template very easily.
This plugin is a kind of a mix between `I18N Custom Fields` and `Special Pages` plugins and is a very powerful tool.

For instance, it allows you to create a bunch of categories with different fields and properties. These can be selected in the Pages menu under `Options` with a dropdown. These can be chosen in the `Pages` menu under `Optiones` and the assigned ItemManager fields appear immediately in the content below GS default editor field.

![example](https://bigin.github.io/ghpages/images/imextrafields/imextra-pages-edit01.png)

## Usage   

It is recommended to add one or more (according to your needs) functions to your `functions.php` file in your `theme/` directory. You can then call these in your template to retrieve items you need. For example, to get an item assigned to the current page, you can use this function:

```
/**
 * This function returns SimpleItem object assigned to the current page.
 * Function expects category id as parameter.
 *
 * @param int $category_id - Category id to which item belongs
 *
 * @return SimpleItem object | null
 */
function get_page_item($category_id) {
    $imanager = imanager();
    $mapper = $imanager->getItemMapper();
    $mapper->alloc($category_id);
    $pageId = Util::computeUnsignedCRC32(return_page_slug());
    return $mapper->getSimpleItem($pageId);
}
```

Now you can use this function in your template as follows:

```
$item = get_page_item(1);
if($item) {
    echo "<h3>$item->name</h3>";
    echo $item->your_field;
}
```

where the argument `1` is the category id to which the item belongs.

If you have any further questions relating to IM Extra Fields you will find help in the ItemManager 2 Thread:

http://get-simple.info/forums/showthread.php?tid=7293

## Installation Instructions:    

**Requirements:**    

`ItemManager 2.4.2` is required to get IM Extra Fields working


**Installing IM Extra Fields from the ZIP file**    

Extract and upload the contents of the ZIP archive to your plugins folder.
Login to GetSimple admin and enable IM Extra Fields on the Plugins tab.

For more information see: https://ehret-studio.com/lab/itemmanager/


