<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005 Jens Ellerbrock (je@hades.org)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Plugin 'Almatis Títle Page' for the 'user_almatis' extension.
 *
 * @author	Jens Ellerbrock <je@hades.org>
 */




class user_almatis_pi1 {
	
	function proc($wizardItems)    {
		global $LANG;
		
		$LL = include(t3lib_extMgm::extPath('user_almatis').'locallang.php');
		
		$wizardItems['user_almatis'] = array(
			'header' => $LANG->getLLL('almatis_title',$LL),
		);
		$wizardItems['user_almatis_1'] = array(
			'icon'=>t3lib_extMgm::extRelPath('user_almatis').'pi1/ce_wiz.gif',
			'title'=>$LANG->getLLL('pi1_title',$LL),
			'description'=>$LANG->getLLL('pi1_plus_wiz_description',$LL),
			'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=user_almatis_pi1'
		);
debug($wizardItems);
die(0);	
		return $wizardItems;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/user_almatis/class.user_almatis.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/user_almatis/class.user_almatis.php']);
}

?>