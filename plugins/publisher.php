<?php
//  Author: Trabis
//  URL: http://www.xuups.com
//  E-Mail: lusopoemas@gmail.com

function publisher_useritems($uid, $limit=0, $offset=0)
{
    global $xoopsDB;
    $ret = array();

    $sql = "SELECT itemid FROM ".$xoopsDB->prefix("publisher_items")." WHERE datesub>0 AND datesub<=".time()." AND uid=".$uid;
    $result = $xoopsDB->query($sql, $limit, $offset);
    if ( $result ) {
        while ($row = $xoopsDB->fetchArray($result)){
            $ret[] = $row['itemid'];
        }
    }

    return $ret;
}

function publisher_iteminfo($items, $limit=0, $offset=0)
{
    global $xoopsDB;
    $ret = array();
    $URL_MOD = XOOPS_URL."/modules/publisher";

    $sql = "SELECT s.itemid, s.title, s.datesub, s.body, s.uid, s.counter, s.comments, t.categoryid, t.name
    FROM ".$xoopsDB->prefix("publisher_items")." s, ".$xoopsDB->prefix("publisher_categories")." t
    WHERE s.categoryid=t.categoryid
    AND s.itemid IN (".implode(',',$items).")
    AND s.datesub>0 AND s.datesub<=".time()."
    ORDER BY s.datesub DESC";
    $result = $xoopsDB->query($sql, $limit, $offset);

    $i = 0;
    while($row = $xoopsDB->fetchArray($result)){
        $itemid = $row['itemid'];
        $ret[$i]['link']     = $URL_MOD."/article.php?itemid=".$itemid;
        $ret[$i]['pda']      = $URL_MOD."/print.php?itemid=".$itemid;
        $ret[$i]['cat_link'] = $URL_MOD."/index.php?storytopic=".$row['categoryid'];
        $ret[$i]['title'] = $row['title'];
        $ret[$i]['time']  = $row['datesub'];
        // uid
        $ret[$i]['uid'] = $row['uid'];
        // category
        $ret[$i]['cat_name'] = $row['name'];
        // counter
        $ret[$i]['hits'] = $row['counter'];
        // comments
        $ret[$i]['replies'] = $row['comments'];
        // description
        $myts = MyTextSanitizer::getInstance();
        $html   = 1;
        $smiley = 1;
        $xcodes = 1;
        $ret[$i]['description'] = $myts->displayTarea($row['body'], $html, $smiley, $xcodes);
        $i++;
    }

    return $ret;
}

/*
 function news_data($limit=0, $offset=0)
 {
 global $xoopsDB;

 $sql = "SELECT itemid, title, created FROM ".$xoopsDB->prefix("stories")." WHERE datesub>0 AND datesub<=".time()." ORDER BY itemid";
 $result = $xoopsDB->query($sql,$limit,$offset);

 $i = 0;
 $ret = array();

 while($row = $xoopsDB->fetchArray($result))
 {
 $id = $row['itemid'];
 $ret[$i]['id']    = $id;
 $ret[$i]['link'] = XOOPS_URL."/modules/news/article.php?itemid=".$id."";
 $ret[$i]['title'] = $row['title'];
 $ret[$i]['time']  = $row['created'];
 $i++;
 }

 return $ret;
 }
 */;
