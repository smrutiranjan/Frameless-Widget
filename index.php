<?php
/*
Plugin Name: Frameless Widget
Plugin URI: https://github.com/smrutiranjan/Frameless-Widget
Description: This is a custom widget allow to execute custom search form widget. you can <a href="https://github.com/smrutiranjan/Frameless-Widget/archive/master.zip">download </a>the latest file from <a href="https://github.com/smrutiranjan/Frameless-Widget/archive/master.zip">here</a> for upgrade the plugin.
Author: Smrutiranjan
Author URI: http://smrutiranjan.in
Version: 1.1
Text Domain: Frameless-widget
*/

define('Frameless_WIDGET_TEXT_DOMAIN','frameless_widget');
define("PLUGIN_NAME","Frameless Widget");
define("PLUGIN_TAGLINE","Customize your widget setting");
register_activation_hook(__FILE__,'frameless_widget_install');
		
require_once('class-Frameless-widget.php');
function frameless_widget_install()
{
	$layout1='
/* SelectBoxIt container */
.selectboxit-container {
  position: relative;
  display: block;
  vertical-align: top;
}

/* Styles that apply to all SelectBoxIt elements */
.selectboxit-container * {
  font: 14px Helvetica, Arial;
  /* Prevents text selection */
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: -moz-none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  outline: none;
  white-space: nowrap;
}      

/* Button */
.selectboxit-container .selectboxit {
  width: 100%; /* Width of the dropdown button */
  cursor: pointer;
  margin: 0;
  padding: 0;
  border-radius: 6px;
  overflow: hidden;
  display: block;
  position: relative;
}

/* Height and Vertical Alignment of Text */
.selectboxit-container span, .selectboxit-container .selectboxit-options a {
  height: 35px; /* Height of the drop down */
  line-height:35px; /* Vertically positions the drop down text */
  display: block;
}

/* Focus pseudo selector */
.selectboxit-container .selectboxit:focus {
  outline: 0;
}

/* Disabled Mouse Interaction */
.selectboxit.selectboxit-disabled, .selectboxit-options .selectboxit-disabled {
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
}

/* Button Text */
.selectboxit-text {
  text-indent: 5px;
  overflow: hidden;
  text-overflow: ellipsis;
  float: left;
color:#111111;
font:bold 13px Arial,Helvetica;
}

.selectboxit .selectboxit-option-icon-container {
  margin-left: 5px;
}

/* Options List */
.selectboxit-container .selectboxit-options {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  min-width: 100%;  /* Minimum Width of the dropdown list box options */
  *width: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
  position: absolute;
  overflow-x: hidden;
  overflow-y: auto;
  cursor: pointer;
  display: none;
  z-index: 9999999999999;
  border-radius: 6px;
  text-align: left;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}

/* Individual options */
 .selectboxit-option .selectboxit-option-anchor{
  padding: 0 2px;
}

/* Individual Option Hover Action */
.selectboxit-option .selectboxit-option-anchor:hover {
  text-decoration: none;
}

/* Individual Option Optgroup Header */
.selectboxit-option, .selectboxit-optgroup-header {
  text-indent: 5px; /* Horizontal Positioning of the select box option text */
  margin: 0;
  list-style-type: none;
}

/* The first Drop Down option */
.selectboxit-option-first {
  border-top-right-radius: 6px;
  border-top-left-radius: 6px;
}

/* The first Drop Down option optgroup */
.selectboxit-optgroup-header + .selectboxit-option-first {
  border-top-right-radius: 0px;
  border-top-left-radius: 0px;
}

/* The last Drop Down option */
.selectboxit-option-last {
  border-bottom-right-radius: 6px;
  border-bottom-left-radius: 6px;
}

/* Drop Down optgroup headers */
.selectboxit-optgroup-header {
  font-weight: bold;
}

/* Drop Down optgroup header hover psuedo class */
.selectboxit-optgroup-header:hover {
  cursor: default;
}

/* Drop Down down arrow container */
.selectboxit-arrow-container {
  /* Positions the down arrow */
  width: 30px;
  position: absolute;
  right: 0;
}

/* Drop Down down arrow */
.selectboxit .selectboxit-arrow-container .selectboxit-arrow {
  /* Horizontally centers the down arrow */
  margin: 0 auto;
  position: absolute;
  top: 50%;
  right: 0;
  left: 0;
}

/* Drop Down down arrow for jQueryUI and jQuery Mobile */
.selectboxit .selectboxit-arrow-container .selectboxit-arrow.ui-icon {
  top: 30%;
}

/* Drop Down individual option icon positioning */
.selectboxit-option-icon-container {
  float: left;
}

.selectboxit-container .selectboxit-option-icon {
  margin: 0;
  padding: 0;
  vertical-align: middle;
}

/* Drop Down individual option icon positioning */
.selectboxit-option-icon-url {
  width: 18px;
  background-size: 18px 18px;
  background-repeat: no-repeat;
  height: 100%;
  background-position: center;
  float: left;
}

.selectboxit-rendering {
  display: inline-block !important;
  *display: inline !important;
  zoom: 1 !important;
  visibility: visible !important;
  position: absolute !important;
  top: -9999px !important;
  left: -9999px !important;
}

/* jQueryUI and jQuery Mobile compatability fix - Feel free to remove this style if you are not using jQuery Mobile */
.jqueryui .ui-icon {
  background-color: inherit;
}

/* Another jQueryUI and jQuery Mobile compatability fix - Feel free to remove this style if you are not using jQuery Mobile */
.jqueryui .ui-icon-triangle-1-s {
  background-position: -64px -16px;
}

/*
  Default Theme
  -------------
  Note: Feel free to remove all of the CSS underneath this line if you are not using the default theme
*/
.selectboxit-btn {
  background-color: #f5f5f5;
  background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
  background-repeat: repeat-x;
  border: 1px solid #cccccc;
  border-color: #e6e6e6 #e6e6e6 #bfbfbf;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  border-bottom-color: #b3b3b3;
}

.selectboxit-btn.selectboxit-enabled:hover,
.selectboxit-btn.selectboxit-enabled:focus,
.selectboxit-btn.selectboxit-enabled:active {
  color: #333333;
  background:none;
}

.selectboxit-btn.selectboxit-enabled:hover,
.selectboxit-btn.selectboxit-enabled:focus {
  color: #333333;
  text-decoration: none;
  background-position: 0 -15px;
}

.selectboxit-default-arrow {
  width: 0;
  height: 0;
  border-top: 4px solid #000000;
  border-right: 4px solid transparent;
  border-left: 4px solid transparent;
}

.selectboxit-list {
  background-color: #ffffff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.selectboxit-list .selectboxit-option-anchor {
  color: #333333;
}

.selectboxit-list > .selectboxit-focus > .selectboxit-option-anchor {
  color: #ffffff;
  background-color: #0081c2;
  background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
  background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
  background-image: -o-linear-gradient(top, #0088cc, #0077b3);
  background-image: linear-gradient(to bottom, #0088cc, #0077b3);
  background-repeat: repeat-x;
}

.selectboxit-list > .selectboxit-disabled > .selectboxit-option-anchor {
  color: #999999;
}
.frameless_widget_div h1{  
    display: block;
    font-size: 17px;
    font-weight: 700;
    line-height: 23px;
    margin: 0;
    padding: 20px 0 0;
    text-align: left;
}	
.col1{width:49%;float:left;}
.col2{width:49%;float:left;margin-left:2%;}
.clear5{clear:both;height:15px;}
.frameless_widget_div h1{
	color:#59595a;
	text-transform:capitalize;
	font-weight:bold;
	border-bottom:2px solid #b4b4b5;
	padding:0;
	margin:0;
}
.frameless_widget_div{
	font-size:13px;
	padding:5px;
	border-radius:8px;
	border:2px solid #026cd6;
	background-color:#026cd6;
	width:218px;
	margin:0 auto;
}
#txtStartDate,#txtEndDate{
	background:none;
	width:86%;
	padding:0px;
	border:none;
	color:#111111;
	font:bold 13px Arial,Helvetica;
	text-indent:10px;
}
.ui-input-text input, .ui-input-search input{
min-height:2.6em;
}
.ui-select .ui-btn > span:not(.ui-li-count) {
text-align:left;
}
.ui-datepicker .ui-datepicker-header {
background:none repeat scroll 0 0 #026CD6;
color:#fff;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
 background:none repeat scroll 0 0 #026CD6;
    color: #FFFFFF;
}
.ui-icon-arrow-d{
background:url('.plugins_url('down_arrow.png', __FILE__).') no-repeat;
}
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
color:#111;
background:none repeat scroll 0 0 #026CD6;
border:1px solid #026CD6;
}
.ui-datepicker .ui-datepicker-next span {
background:url('.plugins_url('next.png', __FILE__).') no-repeat;
}
.ui-datepicker .ui-datepicker-prev span{
background:url('.plugins_url('prev.png', __FILE__).') no-repeat;
}
.ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
color:#111;
background:none;border:none;
}
.ui-state-hover, .ui-widget-content .ui-state-hover{
color:#111;
}
.frameless_widget_div img{
vertical-align:middle;
}
.frameless_widget_div ul li
{
background:none;
padding:5px;
margin:0;
}
.tabsidebar .ui-widget-content{
	border:none;
}
.ui-tabs .ui-tabs-panel
{
	padding:0;
}
.frameless_widget_div label{
	color:#fff;
}
';
	$layout2='/* Dropdown control */
.selectBox-dropdown {
    min-width: 150px;
    position: relative;
    border: solid 1px #BBB;
    line-height: 1.5;
    text-decoration: none;
    text-align: left;
    color: #000;
    outline: none;
    vertical-align: middle;
    background: #F2F2F2;
    background: -moz-linear-gradient(top, #F8F8F8 1%, #E1E1E1 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(1%, #F8F8F8), color-stop(100%, #E1E1E1));
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#F8F8F8", endColorstr="#E1E1E1", GradientType=0);
    -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, .75);
    -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .75);
    box-shadow: 0 1px 0 rgba(255, 255, 255, .75);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    display: inline-block;
    cursor: default;
}

.selectBox-dropdown:focus,
.selectBox-dropdown:focus .selectBox-arrow {
    border-color: #666;
}

.selectBox-dropdown.selectBox-menuShowing-bottom {
    -moz-border-radius-bottomleft: 0;
    -moz-border-radius-bottomright: 0;
    -webkit-border-bottom-left-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.selectBox-dropdown.selectBox-menuShowing-top {
    -moz-border-radius-topleft: 0;
    -moz-border-radius-topright: 0;
    -webkit-border-top-left-radius: 0;
    -webkit-border-top-right-radius: 0;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.selectBox-dropdown .selectBox-label {
    padding: 2px 8px;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
}

.selectBox-dropdown .selectBox-arrow {
    position: absolute;
    top: 0;
    right: 0;
    width: 23px;
    height: 100%;
    background: url('.plugins_url('jquery.selectBox-arrow.gif', __FILE__).') 50% center no-repeat;
    border-left: solid 1px #BBB;
}

/* Dropdown menu */
.selectBox-dropdown-menu {
    position: absolute;
    z-index: 99999;
    max-height: 200px;
    min-height: 1em;
    border: solid 1px #BBB; /* should be the same border width as .selectBox-dropdown */
    background: #FFF;
    -moz-box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
    -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
    box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
    overflow: auto;
    -webkit-overflow-scrolling: touch;
}

/* Inline control */
.selectBox-inline {
    min-width: 150px;
    outline: none;
    border: solid 1px #BBB;
    background: #FFF;
    display: inline-block;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    overflow: auto;
}

.selectBox-inline:focus {
    border-color: #666;
}

/* Options */
.selectBox-options,
.selectBox-options LI,
.selectBox-options LI A {
    list-style: none;
    display: block;
    cursor: default;
    padding: 0;
    margin: 0;
}

.selectBox-options.selectBox-options-top{
    border-bottom:none;
	margin-top:1px;
	-moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.selectBox-options.selectBox-options-bottom{
	border-top:none;
    -moz-border-radius-bottomleft: 5px;
    -moz-border-radius-bottomright: 5px;
    -webkit-border-bottom-left-radius: 5px;
    -webkit-border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
}

.selectBox-options LI A {
    line-height: 1.5;
    padding: 0 .5em;
    white-space: nowrap;
    overflow: hidden;
    background: 6px center no-repeat;
}

.selectBox-options LI.selectBox-hover A {
    background-color: #EEE;
}

.selectBox-options LI.selectBox-disabled A {
    color: #888;
    background-color: transparent;
}

.selectBox-options LI.selectBox-selected A {
    background-color: #C8DEF4;
}

.selectBox-options .selectBox-optgroup {
    color: #666;
    background: #EEE;
    font-weight: bold;
    line-height: 1.5;
    padding: 0 .3em;
    white-space: nowrap;
}

/* Disabled state */
.selectBox.selectBox-disabled {
    color: #888 !important;
}

.selectBox-dropdown.selectBox-disabled .selectBox-arrow {
    opacity: .5;
    filter: alpha(opacity=50);
    border-color: #666;
}

.selectBox-inline.selectBox-disabled {
    color: #888 !important;
}

.selectBox-inline.selectBox-disabled .selectBox-options A {
    background-color: transparent !important;
}
.frameless_widget_div h1{  
    display: block;
    font-size: 17px;
    font-weight: 700;
    line-height: 23px;
    margin: 0;
    padding: 20px 0 0;
    text-align: left;
}			
.frameless_widget_div{
    font-size:13px;
}

.clear5{clear:both;height:5px;}
.frameless_widget_div h1{
	color:#fff;
	text-transform:capitalize;
	font-weight:bold;
	border-bottom:2px solid #fff;
	padding:0;
	margin:0;
}
.sel{
	width:100%;
}
.frameless_widget_div label{
	color:#fff;
}
.frameless_widget_div{
	padding:5px;
	border-radius:8px;
	border:2px solid #000;
	background-color:#ea6420;
}
#txtStartDate,#txtEndDate{
	float:right;
}
.frameless_widget_div img{
vertical-align:middle;
}';
	$layout3='/*======================================================================
	Selectric
======================================================================*/
.selectricWrapper { position: relative; margin: 10px 0; cursor: pointer; }
.selectricDisabled { filter: alpha(opacity=50); opacity: 0.5; cursor: default; -webkit-touch-callout: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; }
.selectricOpen { z-index: 9999; }
.selectricHideSelect { position: relative; overflow: hidden; }
.selectricHideSelect select { position: absolute; left: -100%; }
.selectric { background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(to bottom, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#ffffffff\', endColorstr=\'#ffe6e6e6\', GradientType=0); border-color: #e6e6e6 #e6e6e6 #bfbfbf; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); *background-color: #e6e6e6; filter: progid:DXImageTransform.Microsoft.gradient(enabled = false); border: 1px solid #cccccc; *border: 0; border-bottom-color: #b3b3b3; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; position: relative; }
.selectricOpen .selectric { border-color: #CCC; background: #F0F0F0; z-index: 9999; }
.selectric .label { display: block; white-space: nowrap; overflow: hidden; margin: 0 30px 0 0; padding: 6px; /*font-size: 12px; line-height: 1.7; color: #444; */}
.selectric .button { position: absolute; right: 0; top: 0; height: 30px; width: 30px; color: #1966a5; text-align: center; font: normal 18px/30px sans-serif; }
.selectricHover .selectric { border-color: #CCC; }
.selectricHover .selectric .button { color: #888; }
.selectricTempShow { position: absolute !important; visibility: hidden !important; display: block !important; }

/* Items box */
.selectricItems ul,
.selectricItems li { list-style: none; padding: 0; margin: 0; min-height: 20px; line-height: 20px; font-size: 12px; }
.selectricItems { display: none; position: absolute; overflow: auto; top: 100%; left: 0; background: #F9F9F9; border: 1px solid #CCC; z-index: 9998; box-shadow: 0 0 10px -6px; }
.selectricOpen .selectricItems { display: block; }
.selectricItems li { padding: 5px; cursor: pointer; display: block; border-bottom: 1px solid #EEE; color: #666; border-top: 1px solid #FFF; }
.selectricItems li.selected { background: #EFEFEF; color: #444; border-top-color: #E0E0E0; }
.selectricItems li:hover { background: #F0F0F0; color: #444; }
h1{  
    display: block;
    font-size: 17px;   
    margin: 0;
    padding: 5px 0 0;
    text-align: left;
    color:#fff;
    text-transform:capitalize;
   font-weight:bold;
   border-bottom:2px solid #fff;	
}			
.frameless_widget_div{
    font-size:13px;
}
.col1{width:49%;float:left;}
.col2{width:49%;float:left;margin-left:2%;}
.clear5{clear:both;height:5px;}
.selectric .label{color:#333;text-align:left;padding:10px 6px;margin:0;font-weight:normal;font-size:1em;}
.frameless_widget_div label{
	color:#fff;
	font-family: sans-serif;
    font-size: 1em;
    line-height: 1.3;
}
.frameless_widget_div{
	padding:5px;
	border-radius:8px;
	border:2px solid #1966a5;
	background-color:#1966a5;
	color:#fff;
}
#txtStartDate,#txtEndDate{
	background:none;
	width:81%;
       border:none;
       float:left;
}
.frameless_widget_div img{
vertical-align:middle;
}';
	
	$optionarr=array('form1_css'=>$layout1,
					 'form2_css'=>$layout2,
					 'form3_css'=>$layout3,
					 'form1_wg_bg_color'=>'#026CD6',
					 'form2_wg_bg_color'=>'#ea6420',
					 'form3_wg_bg_color'=>'#1966a5',
					 'form1_wg_bg_img'=>'widget-background.jpg','form2_wg_bg_img'=>'widget-background.jpg','form3_wg_bg_img'=>'widget-background.jpg',
					 'form1_wg_bg_stat'=>'disabled','form2_wg_bg_stat'=>'disabled','form3_wg_bg_stat'=>'disabled',
					 
					 'form1_header_img_en'=>'headlogo.png','form2_header_img_en'=>'headlogo.png','form3_header_img_en'=>'headlogo.png',
					 
					 'form1_header_img_ge'=>'headlogo-ge.png','form2_header_img_ge'=>'headlogo-ge.png','form3_header_img_ge'=>'headlogo-ge.png',
					 'form1_header_img_fr'=>'headlogo-fr.png','form2_header_img_fr'=>'headlogo-fr.png','form3_header_img_fr'=>'headlogo-fr.png',
					 'form1_header_img_du'=>'headlogo-du.png','form2_header_img_du'=>'headlogo-du.png','form3_header_img_du'=>'headlogo-du.png',
					 'form1_searchbtn_en'=>'search.png','form2_searchbtn_en'=>'search.png','form3_searchbtn_en'=>'search.png',
					 
					 'form1_searchbtn_ho_en'=>'search_ho.png','form2_searchbtn_ho_en'=>'search_ho.png','form3_searchbtn_ho_en'=>'search_ho.png',
					 'form1_searchbtn_ge'=>'search_ge.png','form2_searchbtn_ge'=>'search_ge.png','form3_searchbtn_ge'=>'search_ge.png',
					 
					 'form1_searchbtn_ho_ge'=>'search_ge_ho.png','form2_searchbtn_ho_ge'=>'search_ge_ho.png','form3_searchbtn_ho_ge'=>'search_ge_ho.png',
					 'form1_searchbtn_fr'=>'search_fr.png','form2_searchbtn_fr'=>'search_fr.png','form3_searchbtn_fr'=>'search_fr.png',
					 
					 'form1_searchbtn_ho_fr'=>'search_fr_ho.png','form2_searchbtn_ho_fr'=>'search_fr_ho.png','form3_searchbtn_ho_fr'=>'search_fr_ho.png',
					 
					'form1_searchbtn_du'=>'search_du.png','form2_searchbtn_du'=>'search_du.png','form3_searchbtn_du'=>'search_du.png',
					
					'form1_searchbtn_ho_du'=>'search_du_ho.png','form2_searchbtn_ho_du'=>'search_du_ho.png','form3_searchbtn_ho_du'=>'search_du_ho.png',
					'pickuplocation_en'=>'Pickup Location',
					'pickupdate_en'=>'Pickup Date',
					'dropofflocation_en'=>'Dropoff Location',			
					'dropoffdate_en'=>'Dropoff Date',
					'samepickup_en'=>'Same Pickup',
					
					'pickuplocation_da'=>'Abholort',
					'pickupdate_da'=>'Abholdatum',
					'dropofflocation_da'=>'R�ckgabestation',
					'dropoffdate_da'=>'Dropoff Date',
					'samepickup_da'=>'Same Pickup',

					'pickuplocation_fr'=>'Lieu de d�part',
					'pickupdate_fr'=>'Date de d�part',
					'dropofflocation_fr'=>'Lieu de retour',
					'dropoffdate_fr'=>'Date de retour',
					'samepickup_fr'=>'M�me lieu de d�part et retour',

					'pickuplocation_du'=>'Abholdatum',
					'pickupdate_du'=>'Abholdatum',
					'dropofflocation_du'=>'R�ckgabestation',
					'dropoffdate_du'=>'Dropoff Date',
					'samepickup_du'=>'Same Pickup'
);
	foreach($optionarr as $ky => $value)
	{
		delete_option($ky);
		add_option($ky,$value, '', 'yes' );
	}
	
}

function Frameless_widget_init(){
	register_widget('Frameless_Widget');
}
add_action('widgets_init','Frameless_widget_init');

function Frameless_widget_load_text_domain(){
	load_plugin_textdomain( Frameless_WIDGET_TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action('plugins_loaded','Frameless_widget_load_text_domain');
add_action( 'init', 'frameless_widget_front_js' );

if ( is_admin() ){ // admin actions
	add_action('admin_menu', 'frameless_widget_setting');	
	add_action( 'admin_init', 'frameless_widget_setting_admin_stylesheet' );  
}
function frameless_widget_front_js() {
	 if (wp_script_is('rollover1.js','enqueued')) {
       return;
     } else {
       wp_register_script( 'rollover1-js', plugins_url('rollover1.js', __FILE__));
		wp_enqueue_script( 'rollover1-js' );
     }
}

function frameless_widget_setting_admin_stylesheet() {
	wp_register_style( 'frameless_widget_setting-style', plugins_url('frameless_widget_setting-admin.css', __FILE__) );
	wp_enqueue_style( 'frameless_widget_setting-style' );
}
function frameless_widget_setting() {
	add_menu_page( 'Frameless Widget', 'Frameless Widget', 'manage_options', 'set_layout1', 'frameless_widget_setting_urls'); 		
	add_submenu_page('set_layout1', __( 'Layout2', 'frameless_widget'), __( 'Layout2', 'frameless_widget' ), 'manage_options', 'set_layout2', 'set_layout2');
	add_submenu_page('set_layout1', __( 'Layout3', 'frameless_widget'), __( 'Layout3', 'frameless_widget' ), 'manage_options', 'set_layout3', 'set_layout3');
	add_submenu_page('set_layout1', __( 'Language', 'frameless_widget'), __( 'Language', 'frameless_widget' ), 'manage_options', 'set_lang', 'set_lang');
}
function frameless_widget_setting_urls() {
	$msg='';
	if(isset($_POST['save'])){	
		$allowedExts = array("gif", "jpeg", "jpg", "png");		
		
		$filenamearr=array('form1_wg_bg_img','form1_header_img_en','form1_header_img_ge','form1_header_img_fr','form1_header_img_du','form1_searchbtn_en','form1_searchbtn_ho_en','form1_searchbtn_ge','form1_searchbtn_ho_ge','form1_searchbtn_fr','form1_searchbtn_ho_fr','form1_searchbtn_du','form1_searchbtn_ho_du');
		foreach($filenamearr as $filename)
		{
			$temp = explode(".", $_FILES[$filename]["name"]);
			$extension = end($temp);
			if(($_FILES[$filename]["size"] < 200000) && in_array($extension, $allowedExts))
			{
				if ($_FILES[$filename]["error"] > 0)
				{
					$msg="Error while uploading file";
				}
				else
				{
					 move_uploaded_file($_FILES[$filename]["tmp_name"],plugin_dir_path( __FILE__ )."/upload/" . $_FILES[$filename]["name"]);
					 delete_option( $filename);
					 add_option( $filename,$_FILES[$filename]["name"], '', 'yes' );
					 
					 delete_option('form1_wg_bg_stat');
					 add_option('form1_wg_bg_stat',$_POST["form1_wg_bg_stat"], '', 'yes' );
					
				}
			}
		}		
		
		if(isset($_POST['form1_css']))
		{
			delete_option( 'form1_css');
			add_option( 'form1_css',$_POST["form1_css"], '', 'yes' ); 
		}
		if(isset($_POST["form1_wg_bg_color"]))
		{
			delete_option( 'form1_wg_bg_color');
			add_option( 'form1_wg_bg_color',$_POST["form1_wg_bg_color"], '', 'yes' ); 
		}
		$msg="Setting has been saved successfully.";
	}
	?>
    <div class="pea_admin_wrap">
        <div class="pea_admin_top">
            <h1><?php echo PLUGIN_NAME ?> <small> - <?php echo PLUGIN_TAGLINE ?></small> - Layout1</h1>
        </div>
 		<?php if($msg!=""){ echo '<div class="msg">'.$msg.'</div>';}?>
        <div class="pea_admin_main_wrap">
            <div class="pea_admin_main_left">
            <form method="post" action="" name="form1" enctype="multipart/form-data">
            	<h2>Header Logo</h2>
                <p>Upload header image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form1_header_img_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_header_img_en') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Upload header image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form1_header_img_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_header_img_ge') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Upload header image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form1_header_img_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_header_img_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                
                 <p>Upload header image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form1_header_img_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_header_img_du') , __FILE__ );?>" target="_blank">Preview</a></p>    
                 
                 <h2>Search Button</h2>
                  <p>Search Button image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_en') , __FILE__ );?>" target="_blank">Preview</a></p> 
                   <p>Hover Search Button image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_ho_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_ho_en') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Search Button image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_ge') , __FILE__ );?>" target="_blank">Preview</a></p>                    
                 <p>Hover Search Button image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_ho_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_ho_ge') , __FILE__ );?>" target="_blank">Preview</a></p>    
                 
                <p>Search Button image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                 <p>Hover Search Button image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_ho_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_ho_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                
                 <p>Search Button image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_du') , __FILE__ );?>" target="_blank">Preview</a></p>
                 <p>Hover Search Button image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form1_searchbtn_ho_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_searchbtn_ho_du') , __FILE__ );?>" target="_blank">Preview</a></p> 
                     
                <h2>Other</h2>    
                 <p>Set Widget Background Color&nbsp;&nbsp;&nbsp;<input type="text" name="form1_wg_bg_color" value="<?php echo get_option('form1_wg_bg_color');?>"/></p>
                  <p>Set Widget Background Image&nbsp;&nbsp;&nbsp;<input type="file" name="form1_wg_bg_img" />&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form1_wg_bg_img') , __FILE__ );?>" target="_blank">Preview</a></p>    
                   <p>Widget Background Image&nbsp;&nbsp;&nbsp;<input type="radio" name="form1_wg_bg_stat" value="enabled" <?php if(get_option('form1_wg_bg_stat')=='enabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Enabled&nbsp;&nbsp;<input type="radio" name="form1_wg_bg_stat" value="disabled" <?php if(get_option('form1_wg_bg_stat')=='disabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Disabled</p>    
                <p>Stylesheet</p>
                <p><textarea name="form1_css" class="regular-text csstxt"><?php echo stripslashes(get_option('form1_css'));?></textarea></p>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Setings') ?>" name="save"/>
                </p>
			</form>            
            </div>
		</div>            
    </div>
    <?php
}
function set_layout2() {
	$msg='';

	if(isset($_POST['save'])){	
		$allowedExts = array("gif", "jpeg", "jpg", "png");		
		
		$filenamearr=array('form2_wg_bg_img','form2_header_img_en','form2_header_img_ge','form2_header_img_fr','form2_header_img_du','form2_searchbtn_en','form2_searchbtn_ho_en','form2_searchbtn_ge','form2_searchbtn_ho_ge','form2_searchbtn_fr','form2_searchbtn_ho_fr','form2_searchbtn_du','form2_searchbtn_ho_du');
		foreach($filenamearr as $filename)
		{
			$temp = explode(".", $_FILES[$filename]["name"]);
			$extension = end($temp);
			if(($_FILES[$filename]["size"] < 200000) && in_array($extension, $allowedExts))
			{
				if ($_FILES[$filename]["error"] > 0)
				{
					$msg="Error while uploading file";
				}
				else
				{
					 move_uploaded_file($_FILES[$filename]["tmp_name"],plugin_dir_path( __FILE__ )."/upload/" . $_FILES[$filename]["name"]);
					 delete_option( $filename);
					 add_option( $filename,$_FILES[$filename]["name"], '', 'yes' );
					 
					 delete_option('form2_wg_bg_stat');
					 add_option('form2_wg_bg_stat',$_POST["form2_wg_bg_stat"], '', 'yes' );
					
				}
			}
		}		
		
		if(isset($_POST['form2_css']))
		{
			delete_option( 'form2_css');
			add_option( 'form2_css',$_POST["form2_css"], '', 'yes' ); 
		}
		if(isset($_POST["form2_wg_bg_color"]))
		{
			delete_option( 'form2_wg_bg_color');
			add_option( 'form2_wg_bg_color',$_POST["form2_wg_bg_color"], '', 'yes' ); 
		}
		$msg="Setting has been saved successfully.";
	}
	?>
    <div class="pea_admin_wrap">
        <div class="pea_admin_top">
            <h1><?php echo PLUGIN_NAME ?> <small> - <?php echo PLUGIN_TAGLINE ?></small> - Layout2</h1>
        </div>
 		<?php if($msg!=""){ echo '<div class="msg">'.$msg.'</div>';}?>

        <div class="pea_admin_main_wrap">
            <div class="pea_admin_main_left">
             <form method="post" action="" name="form1" enctype="multipart/form-data">
            	<h2>Header Logo</h2>
                <p>Upload header image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form2_header_img_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_header_img_en') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Upload header image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form2_header_img_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_header_img_ge') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Upload header image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form2_header_img_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_header_img_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                
                 <p>Upload header image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form2_header_img_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_header_img_du') , __FILE__ );?>" target="_blank">Preview</a></p>    
                 
                 <h2>Search Button</h2>
                  <p>Search Button image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_en') , __FILE__ );?>" target="_blank">Preview</a></p> 
                   <p>Hover Search Button image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_ho_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_ho_en') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Search Button image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_ge') , __FILE__ );?>" target="_blank">Preview</a></p>                    
                 <p>Hover Search Button image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_ho_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_ho_ge') , __FILE__ );?>" target="_blank">Preview</a></p>    
                 
                <p>Search Button image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                 <p>Hover Search Button image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_ho_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_ho_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                
                 <p>Search Button image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_du') , __FILE__ );?>" target="_blank">Preview</a></p>
                 <p>Hover Search Button image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form2_searchbtn_ho_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_searchbtn_ho_du') , __FILE__ );?>" target="_blank">Preview</a></p> 
                     
                <h2>Other</h2>    
                 <p>Set Widget Background Color&nbsp;&nbsp;&nbsp;<input type="text" name="form2_wg_bg_color" value="<?php echo get_option('form2_wg_bg_color');?>"/></p>
                  <p>Set Widget Background Image&nbsp;&nbsp;&nbsp;<input type="file" name="form2_wg_bg_img" />&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form2_wg_bg_img') , __FILE__ );?>" target="_blank">Preview</a></p>    
                   <p>Widget Background Image&nbsp;&nbsp;&nbsp;<input type="radio" name="form2_wg_bg_stat" value="enabled" <?php if(get_option('form2_wg_bg_stat')=='enabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Enabled&nbsp;&nbsp;<input type="radio" name="form2_wg_bg_stat" value="disabled" <?php if(get_option('form2_wg_bg_stat')=='disabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Disabled</p>    
                <p>Stylesheet</p>
                <p><textarea name="form2_css" class="regular-text csstxt"><?php echo stripslashes(get_option('form2_css'));?></textarea></p>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Setings') ?>" name="save"/>
                </p>
			</form>            
            </div>
		</div>            
    </div>
    <?php
}
function set_layout3() {
	$msg='';
	if(isset($_POST['save'])){	
		$allowedExts = array("gif", "jpeg", "jpg", "png");		
		
		$filenamearr=array('form3_wg_bg_img','form3_header_img_en','form3_header_img_ge','form3_header_img_fr','form3_header_img_du','form3_searchbtn_en','form3_searchbtn_ho_en','form3_searchbtn_ge','form3_searchbtn_ho_ge','form3_searchbtn_fr','form3_searchbtn_ho_fr','form3_searchbtn_du','form3_searchbtn_ho_du');
		foreach($filenamearr as $filename)
		{
			$temp = explode(".", $_FILES[$filename]["name"]);
			$extension = end($temp);
			if(($_FILES[$filename]["size"] < 200000) && in_array($extension, $allowedExts))
			{
				if ($_FILES[$filename]["error"] > 0)
				{
					$msg="Error while uploading file";
				}
				else
				{
					 move_uploaded_file($_FILES[$filename]["tmp_name"],plugin_dir_path( __FILE__ )."/upload/" . $_FILES[$filename]["name"]);
					 delete_option( $filename);
					 add_option( $filename,$_FILES[$filename]["name"], '', 'yes' );
					 
					 delete_option('form3_wg_bg_stat');
					 add_option('form3_wg_bg_stat',$_POST["form3_wg_bg_stat"], '', 'yes' );
					
				}
			}
		}		
		
		if(isset($_POST['form3_css']))
		{
			delete_option( 'form3_css');
			add_option( 'form3_css',$_POST["form3_css"], '', 'yes' ); 
		}
		if(isset($_POST["form3_wg_bg_color"]))
		{
			delete_option( 'form3_wg_bg_color');
			add_option( 'form3_wg_bg_color',$_POST["form3_wg_bg_color"], '', 'yes' ); 
		}
		$msg="Setting has been saved successfully.";
	}
	?>
    <div class="pea_admin_wrap">
        <div class="pea_admin_top">
            <h1><?php echo PLUGIN_NAME ?> <small> - <?php echo PLUGIN_TAGLINE ?></small> - Layout3</h1>
        </div>
 		<?php if($msg!=""){ echo '<div class="msg">'.$msg.'</div>';}?>

        <div class="pea_admin_main_wrap">
            <div class="pea_admin_main_left">
             <form method="post" action="" name="form3" enctype="multipart/form-data">
            	<h2>Header Logo</h2>
                <p>Upload header image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form3_header_img_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_header_img_en') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Upload header image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form3_header_img_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_header_img_ge') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Upload header image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form3_header_img_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_header_img_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                
                 <p>Upload header image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form3_header_img_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_header_img_du') , __FILE__ );?>" target="_blank">Preview</a></p>    
                 
                 <h2>Search Button</h2>
                  <p>Search Button image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_en') , __FILE__ );?>" target="_blank">Preview</a></p> 
                   <p>Hover Search Button image for english&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_ho_en"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_ho_en') , __FILE__ );?>" target="_blank">Preview</a></p>    
                
                <p>Search Button image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_ge') , __FILE__ );?>" target="_blank">Preview</a></p>                    
                 <p>Hover Search Button image for german&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_ho_ge"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_ho_ge') , __FILE__ );?>" target="_blank">Preview</a></p>    
                 
                <p>Search Button image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                 <p>Hover Search Button image for france&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_ho_fr"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_ho_fr') , __FILE__ );?>" target="_blank">Preview</a></p> 
                
                 <p>Search Button image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_du') , __FILE__ );?>" target="_blank">Preview</a></p>
                 <p>Hover Search Button image for netherland&nbsp;&nbsp;&nbsp;<input type="file" name="form3_searchbtn_ho_du"/>&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_searchbtn_ho_du') , __FILE__ );?>" target="_blank">Preview</a></p> 
                     
                <h2>Other</h2>    
                 <p>Set Widget Background Color&nbsp;&nbsp;&nbsp;<input type="text" name="form3_wg_bg_color" value="<?php echo get_option('form3_wg_bg_color');?>"/></p>
                  <p>Set Widget Background Image&nbsp;&nbsp;&nbsp;<input type="file" name="form3_wg_bg_img" />&nbsp;<a href="<?php echo plugins_url('/upload/'.get_option( 'form3_wg_bg_img') , __FILE__ );?>" target="_blank">Preview</a></p>    
                   <p>Widget Background Image&nbsp;&nbsp;&nbsp;<input type="radio" name="form3_wg_bg_stat" value="enabled" <?php if(get_option('form3_wg_bg_stat')=='enabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Enabled&nbsp;&nbsp;<input type="radio" name="form3_wg_bg_stat" value="disabled" <?php if(get_option('form3_wg_bg_stat')=='disabled'){ echo 'checked';}?>/>&nbsp;&nbsp;Disabled</p>    
                <p>Stylesheet</p>
                <p><textarea name="form3_css" class="regular-text csstxt"><?php echo stripslashes(get_option('form3_css'));?></textarea></p>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Setings') ?>" name="save"/>
                </p>
			</form>            
            </div>
		</div>            
    </div>
    <?php
}
function set_lang()
{
	$msg='';
	if(isset($_POST['save']))
	{	
		$postarr=array('pickuplocation_en','pickupdate_en','dropofflocation_en','dropoffdate_en','pickuplocation_da','pickupdate_da','dropofflocation_da','dropoffdate_da','pickuplocation_fr','pickupdate_fr','dropofflocation_fr','dropoffdate_fr','pickuplocation_du','pickupdate_du','dropofflocation_du','dropoffdate_du','samepickup_en','samepickup_fr','samepickup_da','samepickup_du');
		foreach($postarr as $value)
		{
			if($_POST[$value]!="")
			{
				delete_option($value);
				add_option( $value,$_POST[$value], '', 'yes' );
				//echo $value.'=>'.$_POST[$value]."<br/>";
			}			
		}
		$msg="Setting has been saved successfully.";
	}
	?>
    <div class="pea_admin_wrap">
        <div class="pea_admin_top">
            <h1><?php echo PLUGIN_NAME ?> <small> - set language</small></h1>
        </div>
 		<?php if($msg!=""){ echo '<div class="msg">'.$msg.'</div>';}?>

        <div class="pea_admin_main_wrap">
            <div class="pea_admin_main_left">
             <form method="post" action="" name="setlangform">
             <table cellpadding="2" cellspacing="2" border="0" width="100%">
             <tr>
             	<td align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td colspan="2" align="left"><h2>English</h2></td>
              </tr>
              <tr>
                <td>Pickup Location</td>
                <td>
                <input type="text"  name="pickuplocation_en" value="<?php echo get_option("pickuplocation_en");?>" class="regular-text"/>
                </td>
              </tr>
              <tr>
                <td>Pickup Date</td>
                <td><input type="text"  name="pickupdate_en" value="<?php echo get_option("pickupdate_en");?>" class="regular-text"/></td>
              </tr>
               <tr>
                <td>Dropoff Location</td>
                <td><input type="text"  name="dropofflocation_en" value="<?php echo get_option("dropofflocation_en");?>" class="regular-text"/></td>
              </tr>
              <tr>
                <td>Dropoff Date</td>
                <td><input type="text"  name="dropoffdate_en" value="<?php echo get_option("dropoffdate_en");?>" class="regular-text"/></td>
              </tr>
                 <tr>
            <td>Same Pickup</td>
           <td><input type="text"  name="samepickup_en" value="<?php echo get_option("samepickup_en");?>" class="regular-text"/>
           </td>
          </tr>
            </table></td>
                            <td align="right"><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td colspan="2" align="left"><h2>German</h2></td>
              </tr>
              <tr>
                <td>Pickup Location</td>
                <td>
                <input type="text"  name="pickuplocation_da" value="<?php echo get_option("pickuplocation_da");?>" class="regular-text"/>
                </td>
              </tr>
              <tr>
                <td>Pickup Date</td>
                <td><input type="text"  name="pickupdate_da" value="<?php echo get_option("pickupdate_da");?>" class="regular-text"/></td>
              </tr>
               <tr>
                <td>Dropoff Location</td>
                <td><input type="text"  name="dropofflocation_da" value="<?php echo get_option("dropofflocation_da");?>" class="regular-text"/></td>
              </tr>
              <tr>
                <td>Dropoff Date</td>
                <td><input type="text"  name="dropoffdate_da" value="<?php echo get_option("dropoffdate_da");?>" class="regular-text"/></td>
              </tr>
                 <tr>
            <td>Same Pickup</td>
           <td><input type="text"  name="samepickup_da" value="<?php echo get_option("samepickup_da");?>" class="regular-text"/>
           </td>
          </tr>
            </table></td>
             </tr>
			<tr>
            	<td align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td colspan="2" align="left"><h2>French</h2></td>
          </tr>
          <tr>
            <td>Pickup Location</td>
            <td>
            <input type="text"  name="pickuplocation_fr" value="<?php echo get_option("pickuplocation_fr");?>" class="regular-text"/>
            </td>
          </tr>
          <tr>
            <td>Pickup Date</td>
            <td><input type="text"  name="pickupdate_fr" value="<?php echo get_option("pickupdate_fr");?>" class="regular-text"/></td>
          </tr>
           <tr>
            <td>Dropoff Location</td>
            <td><input type="text"  name="dropofflocation_fr" value="<?php echo get_option("dropofflocation_fr");?>" class="regular-text"/></td>
          </tr>
          <tr>
            <td>Dropoff Date</td>
            <td><input type="text"  name="dropoffdate_fr" value="<?php echo get_option("dropoffdate_fr");?>" class="regular-text"/></td>
          </tr>
          <tr>
            <td>Same Pickup</td>
           <td><input type="text"  name="samepickup_fr" value="<?php echo get_option("samepickup_fr");?>" class="regular-text"/>
           </td>
          </tr>
        </table></td>
                <td align="right"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                  <tr>
                    <td colspan="2" align="left"><h2>Netherlands</h2></td>
                  </tr>
                  <tr>
                    <td>Pickup Location</td>
                    <td>
                    <input type="text"  name="pickuplocation_du" value="<?php echo get_option("pickuplocation_du");?>" class="regular-text"/>
                    </td>
                  </tr>
                  <tr>
                    <td>Pickup Date</td>
                    <td><input type="text"  name="pickupdate_du" value="<?php echo get_option("pickupdate_du");?>" class="regular-text"/></td>
                  </tr>
                   <tr>
                    <td>Dropoff Location</td>
                    <td><input type="text"  name="dropofflocation_du" value="<?php echo get_option("dropofflocation_du");?>" class="regular-text"/></td>
                  </tr>
                  <tr>
                    <td>Dropoff Date</td>
                    <td><input type="text"  name="dropoffdate_du" value="<?php echo get_option("dropoffdate_du");?>" class="regular-text"/></td>
                  </tr>
                  <tr>
    				<td>Same Pickup</td>
				   <td><input type="text"  name="samepickup_du" value="<?php echo get_option("samepickup_du");?>" class="regular-text"/>
                   </td>
				  </tr>
                </table></td>
            </tr>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Language Seting') ?>" name="save"/>
                </p>
			</form>            
            </div>
		</div>            
    </div>
<?php    
}
?>
