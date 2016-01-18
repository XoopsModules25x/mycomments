<?php
//  Author: Trabis
//  URL: http://www.xuups.com
//  E-Mail: lusopoemas@gmail.com

$modversion['name'] = _MI_MYCOM_NAME;
$modversion['version'] = "1.01";
$modversion['description'] = _MI_MYCOM_DSC;
$modversion['author'] = "www.xuups.com";
$modversion['credits'] = "Trabis";
$modversion['help']        = 'page=help';
$modversion['license']     = 'GNU GPL 2.0 or later';
$modversion['license_url'] = "www.gnu.org/licenses/gpl-2.0.html/";
$modversion['official'] = 0;
$modversion['image'] = "images/slogo.png";
$modversion['dirname'] = "mycomments";
$modversion['dirmoduleadmin'] = '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']        = '../../Frameworks/moduleclasses/icons/16';
$modversion['icons32']        = '../../Frameworks/moduleclasses/icons/32';
//about
$modversion['release_date']        = '2012/12/17';
$modversion["module_website_url"] = "www.xoops.org";
$modversion["module_website_name"] = "XOOPS";
$modversion["module_status"]       = "Final";
$modversion['min_php']             = '5.5';
$modversion['min_xoops']           = "2.5.7.2";
$modversion['min_admin']           = '1.1';
$modversion['min_db']              = array(
    'mysql'  => '5.0.7',
    'mysqli' => '5.0.7'
);

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Menu
$modversion['hasMain'] = 1;
$modversion['system_menu'] = 1;

//Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "mycomments_search";

// Templates
$i=0; $i++;
$modversion['templates'][$i]['file'] = "mycomments_comments.html";
$modversion['templates'][$i]['description'] = '';
$i++;
$modversion['templates'][$i]['file'] = "mycomments_navigation.html";
$modversion['templates'][$i]['description'] = '';

// Blocks
$i=0;$i++;
$modversion['blocks'][$i]['file'] = "mycomments_blocks.php";
$modversion['blocks'][$i]['name'] = _MI_MYCOM_BNAME1;
$modversion['blocks'][$i]['description'] = "";
$modversion['blocks'][$i]['show_func'] = "b_mycomments_show";
$modversion['blocks'][$i]['edit_func'] = "b_mycomments_edit";
$modversion['blocks'][$i]['options'] = "10";
$modversion['blocks'][$i]['template'] = "mycomments_block_comments.html";

$i++;
$modversion['blocks'][$i]['file'] = "mycomments_blocks.php";
$modversion['blocks'][$i]['name'] = _MI_MYCOM_BNAME2;
$modversion['blocks'][$i]['description'] = "";
$modversion['blocks'][$i]['show_func'] = "b_mycomments2_show";
$modversion['blocks'][$i]['edit_func'] = "b_mycomments2_edit";
$modversion['blocks'][$i]['options'] = "10";
$modversion['blocks'][$i]['template'] = "mycomments_block_comments.html";

//Menu
$i = 0;
global $xoopsUser;
if (is_object($xoopsUser)) {
    $i++;
    $modversion['sub'][$i]['name'] = _MI_MYCOM_COM_RECIEVED;
    $modversion['sub'][$i]['url'] = "index.php?view=0";

    $i++;
    $modversion['sub'][$i]['name'] = _MI_MYCOM_COM_SENT;
    $modversion['sub'][$i]['url'] = "index.php?view=1";
}

//Configs
$i=0;
/**
 * How to display Author's name, username, full name or nothing ?
 */
$i++;
$modversion['config'][$i]['name'] = 'displayname';
$modversion['config'][$i]['title'] = '_MI_MYCOM_NAMEDISPLAY';
$modversion['config'][$i]['description'] = '_MI_MYCOM_NAMEDISPLAY_DSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['options']    = array('_MI_MYCOM_DISPLAYNAME1' => 1, '_MI_MYCOM_DISPLAYNAME2' => 2);

/**
 * Number of coments per page ?
 */
$i++;
$modversion['config'][$i]['name'] = 'comnum';
$modversion['config'][$i]['title'] = '_MI_MYCOM_COMNUM';
$modversion['config'][$i]['description'] = '_MI_MYCOM_COMNUM_DSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 10;
$modversion['config'][$i]['options'] = array('5' => 5, '10' => 10, '20' => 20, '50' => 50, '100' => 100);
