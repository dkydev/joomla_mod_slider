<?php

defined('_JEXEC') or die;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Get the dbo
$db = JFactory::getDbo();

// Get an instance of the gene`1ric articles model
$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

// Set application parameters in model
$app = JFactory::getApplication();
$appParams = $app->getParams();
$model->setState('params', $appParams);

// Set the filters based on the module params
$model->setState('list.start', 0);
$model->setState('list.limit', (int) $params->get('count', 10));
$model->setState('filter.published', 1);

// Category filter
$model->setState('filter.category_id', $params->get('catid', array()));

$model->setState('list.ordering', "a.ordering");
$model->setState('list.direction', "ASC");

$items = $model->getItems();

foreach ($items as $i => $item)
{
    //$item->slug = $item->id . ':' . $item->alias;
    //$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));

    $images = json_decode($item->images);
    $items[$i]->imageURL = $images->image_fulltext;
    $items[$i]->imageCaption = $images->image_fulltext_caption;
}

$interval = $params->get('interval', 5000);

require JModuleHelper::getLayoutPath('mod_slider', $params->get('layout', 'default'));
