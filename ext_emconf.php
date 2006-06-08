<?php

########################################################################
# Extension Manager/Repository config file for ext: "pdf_generator2"
#
# Auto generated 08-06-2006 01:50
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'PDF Generator 2',
	'description' => 'This Extension renders the pagecontent to a PDF file.
It supports css and does NOT need an external program to perform the conversion. It can use either fpdf or pdflib.',
	'category' => 'misc',
	'shy' => 1,
	'version' => '0.5.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Jens Ellerbrock',
	'author_email' => 'je@hades.org',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:363:{s:26:"class.tx_pdfgenerator2.php";s:4:"3a5e";s:22:"class.user_almatis.php";s:4:"5192";s:21:"class.ux_tslib_fe.php";s:4:"0387";s:21:"ext_conf_template.txt";s:4:"e423";s:12:"ext_icon.gif";s:4:"d5de";s:17:"ext_localconf.php";s:4:"92d3";s:28:"ext_typoscript_constants.txt";s:4:"d374";s:24:"ext_typoscript_setup.txt";s:4:"a7a9";s:11:"gen_pdf.php";s:4:"8fa4";s:14:"doc/manual.sxw";s:4:"242b";s:18:"html2ps/.cvsignore";s:4:"2a7d";s:17:"html2ps/.htaccess";s:4:"d5cd";s:17:"html2ps/ChangeLog";s:4:"adab";s:28:"html2ps/background.image.php";s:4:"79bf";s:22:"html2ps/background.php";s:4:"8b5f";s:31:"html2ps/background.position.php";s:4:"e8bd";s:28:"html2ps/box.block.inline.php";s:4:"d500";s:21:"html2ps/box.block.php";s:4:"2f50";s:18:"html2ps/box.br.php";s:4:"d8f6";s:22:"html2ps/box.button.php";s:4:"f575";s:28:"html2ps/box.button.reset.php";s:4:"4f88";s:29:"html2ps/box.button.submit.php";s:4:"55e0";s:27:"html2ps/box.checkbutton.php";s:4:"df33";s:25:"html2ps/box.container.php";s:4:"0d5b";s:28:"html2ps/box.field.pageno.php";s:4:"6fae";s:27:"html2ps/box.field.pages.php";s:4:"4598";s:20:"html2ps/box.form.php";s:4:"a7f7";s:21:"html2ps/box.frame.php";s:4:"c4a8";s:33:"html2ps/box.generic.formatted.php";s:4:"8947";s:30:"html2ps/box.generic.inline.php";s:4:"f79e";s:23:"html2ps/box.generic.php";s:4:"a49c";s:22:"html2ps/box.iframe.php";s:4:"9461";s:19:"html2ps/box.img.php";s:4:"972f";s:30:"html2ps/box.inline.control.php";s:4:"6f34";s:22:"html2ps/box.inline.php";s:4:"4930";s:25:"html2ps/box.input.img.php";s:4:"041e";s:30:"html2ps/box.input.password.php";s:4:"044b";s:26:"html2ps/box.input.text.php";s:4:"e6a2";s:30:"html2ps/box.input.textarea.php";s:4:"8716";s:22:"html2ps/box.legend.php";s:4:"a9d9";s:25:"html2ps/box.list-item.php";s:4:"e791";s:20:"html2ps/box.null.php";s:4:"c87e";s:15:"html2ps/box.php";s:4:"450a";s:27:"html2ps/box.radiobutton.php";s:4:"3fee";s:22:"html2ps/box.select.php";s:4:"1b7b";s:26:"html2ps/box.table.cell.php";s:4:"ee3c";s:21:"html2ps/box.table.php";s:4:"2065";s:25:"html2ps/box.table.row.php";s:4:"4d9e";s:29:"html2ps/box.table.section.php";s:4:"7238";s:20:"html2ps/box.text.php";s:4:"b070";s:27:"html2ps/box.text.string.php";s:4:"8b21";s:36:"html2ps/box.utils.text-align.inc.php";s:4:"785e";s:26:"html2ps/box.whitespace.php";s:4:"6129";s:17:"html2ps/color.php";s:4:"cbc1";s:22:"html2ps/config.inc.php";s:4:"8b66";s:24:"html2ps/config.parse.php";s:4:"5730";s:30:"html2ps/content_type.class.php";s:4:"f05e";s:27:"html2ps/converter.class.php";s:4:"041c";s:25:"html2ps/css.apply.inc.php";s:4:"76a7";s:36:"html2ps/css.background.color.inc.php";s:4:"475a";s:36:"html2ps/css.background.image.inc.php";s:4:"07b1";s:30:"html2ps/css.background.inc.php";s:4:"4860";s:39:"html2ps/css.background.position.inc.php";s:4:"18ce";s:37:"html2ps/css.background.repeat.inc.php";s:4:"9cc7";s:35:"html2ps/css.border.collapse.inc.php";s:4:"cded";s:26:"html2ps/css.border.inc.php";s:4:"45e5";s:32:"html2ps/css.border.style.inc.php";s:4:"7c65";s:26:"html2ps/css.bottom.inc.php";s:4:"4d6b";s:25:"html2ps/css.clear.inc.php";s:4:"6b1e";s:25:"html2ps/css.color.inc.php";s:4:"9a87";s:26:"html2ps/css.colors.inc.php";s:4:"1751";s:27:"html2ps/css.content.inc.php";s:4:"5a0d";s:28:"html2ps/css.defaults.inc.php";s:4:"9718";s:27:"html2ps/css.display.inc.php";s:4:"ecaf";s:25:"html2ps/css.float.inc.php";s:4:"82c4";s:24:"html2ps/css.font.inc.php";s:4:"172b";s:25:"html2ps/css.frame.inc.php";s:4:"6460";s:26:"html2ps/css.height.inc.php";s:4:"44e7";s:19:"html2ps/css.inc.php";s:4:"1ab0";s:24:"html2ps/css.left.inc.php";s:4:"293d";s:31:"html2ps/css.line-height.inc.php";s:4:"6b0f";s:36:"html2ps/css.list-style-image.inc.php";s:4:"b616";s:39:"html2ps/css.list-style-position.inc.php";s:4:"6c01";s:35:"html2ps/css.list-style-type.inc.php";s:4:"9004";s:30:"html2ps/css.list-style.inc.php";s:4:"44dc";s:26:"html2ps/css.margin.inc.php";s:4:"053c";s:28:"html2ps/css.overflow.inc.php";s:4:"e535";s:27:"html2ps/css.padding.inc.php";s:4:"e20e";s:36:"html2ps/css.page-break-after.inc.php";s:4:"be15";s:30:"html2ps/css.page-break.inc.php";s:4:"1595";s:25:"html2ps/css.parse.inc.php";s:4:"9b7c";s:31:"html2ps/css.parse.media.inc.php";s:4:"9a02";s:28:"html2ps/css.position.inc.php";s:4:"b3ed";s:37:"html2ps/css.pseudo.add.margin.inc.php";s:4:"a53d";s:32:"html2ps/css.pseudo.align.inc.php";s:4:"2195";s:38:"html2ps/css.pseudo.cellpadding.inc.php";s:4:"2f44";s:38:"html2ps/css.pseudo.cellspacing.inc.php";s:4:"7679";s:38:"html2ps/css.pseudo.form.action.inc.php";s:4:"7565";s:42:"html2ps/css.pseudo.form.radiogroup.inc.php";s:4:"332c";s:43:"html2ps/css.pseudo.link.destination.inc.php";s:4:"b126";s:38:"html2ps/css.pseudo.link.target.inc.php";s:4:"f0c8";s:38:"html2ps/css.pseudo.listcounter.inc.php";s:4:"fe92";s:37:"html2ps/css.pseudo.localalign.inc.php";s:4:"0554";s:33:"html2ps/css.pseudo.nowrap.inc.php";s:4:"efff";s:39:"html2ps/css.pseudo.table.border.inc.php";s:4:"e4b5";s:25:"html2ps/css.right.inc.php";s:4:"e9d7";s:25:"html2ps/css.rules.inc.php";s:4:"5314";s:29:"html2ps/css.selectors.inc.php";s:4:"3633";s:30:"html2ps/css.text-align.inc.php";s:4:"aa84";s:35:"html2ps/css.text-decoration.inc.php";s:4:"7490";s:31:"html2ps/css.text-indent.inc.php";s:4:"bb0c";s:23:"html2ps/css.top.inc.php";s:4:"477f";s:25:"html2ps/css.utils.inc.php";s:4:"7616";s:26:"html2ps/css.valign.inc.php";s:4:"43d8";s:34:"html2ps/css.vertical-align.inc.php";s:4:"3b9b";s:30:"html2ps/css.visibility.inc.php";s:4:"4cea";s:31:"html2ps/css.white-space.inc.php";s:4:"5275";s:25:"html2ps/css.width.inc.php";s:4:"4fa7";s:27:"html2ps/css.z-index.inc.php";s:4:"6d90";s:35:"html2ps/destination._http.class.php";s:4:"0aa3";s:40:"html2ps/destination._interface.class.php";s:4:"304e";s:37:"html2ps/destination.browser.class.php";s:4:"06d1";s:38:"html2ps/destination.download.class.php";s:4:"566f";s:34:"html2ps/destination.file.class.php";s:4:"d4de";s:28:"html2ps/doc.anchor.class.php";s:4:"71d2";s:30:"html2ps/dom.activelink.inc.php";s:4:"9b4b";s:24:"html2ps/dom.php5.inc.php";s:4:"a515";s:31:"html2ps/encoding.cp1251.inc.php";s:4:"695a";s:30:"html2ps/encoding.cp866.inc.php";s:4:"1770";s:33:"html2ps/encoding.dingbats.inc.php";s:4:"8cfa";s:33:"html2ps/encoding.entities.inc.php";s:4:"3a53";s:31:"html2ps/encoding.glyphs.inc.php";s:4:"12fd";s:24:"html2ps/encoding.inc.php";s:4:"0723";s:35:"html2ps/encoding.iso-8859-1.inc.php";s:4:"23eb";s:36:"html2ps/encoding.iso-8859-10.inc.php";s:4:"872e";s:36:"html2ps/encoding.iso-8859-11.inc.php";s:4:"6b7c";s:36:"html2ps/encoding.iso-8859-13.inc.php";s:4:"8b84";s:36:"html2ps/encoding.iso-8859-14.inc.php";s:4:"cb56";s:36:"html2ps/encoding.iso-8859-15.inc.php";s:4:"1f7e";s:35:"html2ps/encoding.iso-8859-2.inc.php";s:4:"b96a";s:35:"html2ps/encoding.iso-8859-3.inc.php";s:4:"5b3e";s:35:"html2ps/encoding.iso-8859-4.inc.php";s:4:"9ebe";s:35:"html2ps/encoding.iso-8859-5.inc.php";s:4:"61b7";s:35:"html2ps/encoding.iso-8859-7.inc.php";s:4:"e6af";s:35:"html2ps/encoding.iso-8859-9.inc.php";s:4:"bf43";s:31:"html2ps/encoding.koi8-r.inc.php";s:4:"2de5";s:31:"html2ps/encoding.symbol.inc.php";s:4:"1001";s:37:"html2ps/encoding.windows-1250.inc.php";s:4:"4aa2";s:37:"html2ps/encoding.windows-1251.inc.php";s:4:"49f2";s:37:"html2ps/encoding.windows-1252.inc.php";s:4:"e876";s:36:"html2ps/fetched_data._html.class.php";s:4:"931d";s:41:"html2ps/fetched_data._interface.class.php";s:4:"a863";s:35:"html2ps/fetched_data.file.class.php";s:4:"0fe9";s:34:"html2ps/fetched_data.url.class.php";s:4:"62e7";s:36:"html2ps/fetcher._interface.class.php";s:4:"0376";s:31:"html2ps/fetcher.local.class.php";s:4:"42cf";s:29:"html2ps/fetcher.url.class.php";s:4:"c6af";s:40:"html2ps/filter.data._interface.class.php";s:4:"a595";s:37:"html2ps/filter.data.doctype.class.php";s:4:"dc8e";s:40:"html2ps/filter.data.html2xhtml.class.php";s:4:"d8c5";s:34:"html2ps/filter.data.utf8.class.php";s:4:"ec8d";s:41:"html2ps/filter.data.xhtml2xhtml.class.php";s:4:"a2b2";s:42:"html2ps/filter.output._interface.class.php";s:4:"2328";s:36:"html2ps/filter.output.gzip.class.php";s:4:"341d";s:38:"html2ps/filter.output.ps2pdf.class.php";s:4:"ab4c";s:40:"html2ps/filter.post._interface.class.php";s:4:"c1f8";s:39:"html2ps/filter.pre._interface.class.php";s:4:"91d9";s:35:"html2ps/filter.pre.fields.class.php";s:4:"3889";s:37:"html2ps/filter.pre.headfoot.class.php";s:4:"70e5";s:46:"html2ps/filter.pre.height-constraint.class.php";s:4:"01cb";s:34:"html2ps/flow_context.class.inc.php";s:4:"f4c7";s:35:"html2ps/flow_viewport.class.inc.php";s:4:"bf60";s:22:"html2ps/font.class.php";s:4:"764d";s:30:"html2ps/font.constants.inc.php";s:4:"57c4";s:31:"html2ps/font.resolver.class.php";s:4:"199c";s:30:"html2ps/font_factory.class.php";s:4:"d91b";s:18:"html2ps/height.php";s:4:"7a25";s:26:"html2ps/html.attrs.inc.php";s:4:"c77f";s:25:"html2ps/html.list.inc.php";s:4:"7e0e";s:22:"html2ps/html2ps.config";s:4:"db04";s:19:"html2ps/html2ps.php";s:4:"1eb0";s:23:"html2ps/image.class.php";s:4:"42cd";s:17:"html2ps/index.php";s:4:"7cb5";s:35:"html2ps/layout._interface.class.php";s:4:"91f1";s:32:"html2ps/layout.default.class.php";s:4:"3df1";s:27:"html2ps/layout.ps.class.php";s:4:"e50b";s:28:"html2ps/list-style.image.php";s:4:"ba6f";s:26:"html2ps/localalign.inc.php";s:4:"400a";s:28:"html2ps/manager.encoding.php";s:4:"674a";s:28:"html2ps/media.layout.inc.php";s:4:"8e4b";s:33:"html2ps/output._generic.class.php";s:4:"9ba7";s:38:"html2ps/output._generic.class.php.orig";s:4:"41b7";s:37:"html2ps/output._generic.class.php.rej";s:4:"50cf";s:37:"html2ps/output._generic.pdf.class.php";s:4:"6466";s:36:"html2ps/output._generic.ps.class.php";s:4:"46c8";s:35:"html2ps/output._interface.class.php";s:4:"a50b";s:31:"html2ps/output.fastps.class.php";s:4:"68c7";s:34:"html2ps/output.fastps.l2.class.php";s:4:"1b49";s:29:"html2ps/output.fpdf.class.php";s:4:"b027";s:31:"html2ps/output.pdflib.class.php";s:4:"1688";s:35:"html2ps/parser._interface.class.php";s:4:"9f9b";s:30:"html2ps/parser.xhtml.class.php";s:4:"816b";s:19:"html2ps/phpinfo.php";s:4:"03d2";s:26:"html2ps/pipeline.class.php";s:4:"eb2a";s:34:"html2ps/pipeline.factory.class.php";s:4:"ad68";s:32:"html2ps/ps.image.encoder.inc.php";s:4:"4529";s:39:"html2ps/ps.image.encoder.simple.inc.php";s:4:"e68f";s:39:"html2ps/ps.image.encoder.stream.inc.php";s:4:"665f";s:42:"html2ps/ps.l2.image.encoder.stream.inc.php";s:4:"8fef";s:42:"html2ps/ps.l3.image.encoder.stream.inc.php";s:4:"e0c2";s:23:"html2ps/ps.text.inc.php";s:4:"324d";s:26:"html2ps/ps.unicode.inc.php";s:4:"7c47";s:24:"html2ps/ps.utils.inc.php";s:4:"0498";s:29:"html2ps/ps.whitespace.inc.php";s:4:"0275";s:24:"html2ps/sample.batch.php";s:4:"3b30";s:34:"html2ps/sample.pipeline.custom.php";s:4:"7eef";s:35:"html2ps/sample.pipeline.default.php";s:4:"3579";s:27:"html2ps/sample.simplest.php";s:4:"72d0";s:28:"html2ps/stubs.common.inc.php";s:4:"59e9";s:39:"html2ps/stubs.file_get_contents.inc.php";s:4:"ba6a";s:35:"html2ps/stubs.is_executable.inc.php";s:4:"c664";s:18:"html2ps/system.php";s:4:"4f33";s:23:"html2ps/systemcheck.php";s:4:"f9b0";s:24:"html2ps/tag.body.inc.php";s:4:"74da";s:24:"html2ps/tag.font.inc.php";s:4:"4fba";s:25:"html2ps/tag.frame.inc.php";s:4:"e3de";s:23:"html2ps/tag.img.inc.php";s:4:"fd5a";s:25:"html2ps/tag.input.inc.php";s:4:"e14e";s:26:"html2ps/tag.select.inc.php";s:4:"f4be";s:24:"html2ps/tag.span.inc.php";s:4:"8646";s:25:"html2ps/tag.table.inc.php";s:4:"c995";s:22:"html2ps/tag.td.inc.php";s:4:"499a";s:24:"html2ps/tag.ulol.inc.php";s:4:"0313";s:25:"html2ps/tag.utils.inc.php";s:4:"6d57";s:21:"html2ps/test.form.php";s:4:"a756";s:16:"html2ps/test.php";s:4:"2d80";s:31:"html2ps/tree.navigation.inc.php";s:4:"cef0";s:29:"html2ps/treebuilder.class.php";s:4:"343c";s:23:"html2ps/utils_array.php";s:4:"7fe4";s:25:"html2ps/utils_graphic.php";s:4:"4902";s:24:"html2ps/utils_number.php";s:4:"5dc9";s:22:"html2ps/utils_text.php";s:4:"90c1";s:23:"html2ps/utils_units.php";s:4:"b1d9";s:21:"html2ps/utils_url.php";s:4:"9fd7";s:17:"html2ps/width.php";s:4:"f3fb";s:31:"html2ps/xhtml.autoclose.inc.php";s:4:"a66f";s:30:"html2ps/xhtml.comments.inc.php";s:4:"3924";s:29:"html2ps/xhtml.deflist.inc.php";s:4:"b3b1";s:30:"html2ps/xhtml.entities.inc.php";s:4:"ded6";s:27:"html2ps/xhtml.lists.inc.php";s:4:"f074";s:23:"html2ps/xhtml.p.inc.php";s:4:"c452";s:28:"html2ps/xhtml.script.inc.php";s:4:"77df";s:29:"html2ps/xhtml.selects.inc.php";s:4:"cdd9";s:27:"html2ps/xhtml.style.inc.php";s:4:"47cc";s:28:"html2ps/xhtml.tables.inc.php";s:4:"7362";s:27:"html2ps/xhtml.utils.inc.php";s:4:"2f69";s:30:"html2ps/xml.validation.inc.php";s:4:"0124";s:24:"html2ps/cache/index.html";s:4:"d917";s:27:"html2ps/classes/include.php";s:4:"1d8d";s:47:"html2ps/classes/org/active-link/doc/DocHTML.php";s:4:"1147";s:46:"html2ps/classes/org/active-link/doc/Method.php";s:4:"e7e1";s:48:"html2ps/classes/org/active-link/doc/PHPClass.php";s:4:"7289";s:50:"html2ps/classes/org/active-link/net/HTTPClient.php";s:4:"88a1";s:50:"html2ps/classes/org/active-link/net/HTTPServer.php";s:4:"023c";s:46:"html2ps/classes/org/active-link/net/Socket.php";s:4:"456b";s:44:"html2ps/classes/org/active-link/sys/File.php";s:4:"9ad2";s:46:"html2ps/classes/org/active-link/xml/Branch.php";s:4:"5406";s:44:"html2ps/classes/org/active-link/xml/Leaf.php";s:4:"cae0";s:43:"html2ps/classes/org/active-link/xml/RSS.php";s:4:"c678";s:43:"html2ps/classes/org/active-link/xml/Tag.php";s:4:"a546";s:44:"html2ps/classes/org/active-link/xml/Tree.php";s:4:"d94b";s:43:"html2ps/classes/org/active-link/xml/XML.php";s:4:"bc3f";s:49:"html2ps/classes/org/active-link/xml/XMLBranch.php";s:4:"1fbc";s:51:"html2ps/classes/org/active-link/xml/XMLDocument.php";s:4:"e594";s:47:"html2ps/classes/org/active-link/xml/XMLLeaf.php";s:4:"0d26";s:52:"html2ps/classes/org/active-link/xml/XMLRPCClient.php";s:4:"cb2c";s:45:"html2ps/classes/org/active-link/xml/XPath.php";s:4:"a2aa";s:24:"html2ps/fonts/readme.txt";s:4:"c148";s:21:"html2ps/fpdf/fpdf.php";s:4:"211b";s:45:"html2ps/fpdf/font/Courier-Bold-iso-8859-1.php";s:4:"d5bd";s:48:"html2ps/fpdf/font/Courier-Oblique-iso-8859-1.php";s:4:"91da";s:40:"html2ps/fpdf/font/Courier-iso-8859-1.php";s:4:"2acf";s:41:"html2ps/fpdf/font/Courier-iso-8859-15.php";s:4:"1807";s:47:"html2ps/fpdf/font/Helvetica-Bold-iso-8859-1.php";s:4:"27d3";s:54:"html2ps/fpdf/font/Helvetica-BoldOblique-iso-8859-1.php";s:4:"aedb";s:50:"html2ps/fpdf/font/Helvetica-Oblique-iso-8859-1.php";s:4:"0276";s:42:"html2ps/fpdf/font/Helvetica-iso-8859-1.php";s:4:"2424";s:43:"html2ps/fpdf/font/Helvetica-iso-8859-15.php";s:4:"e56e";s:43:"html2ps/fpdf/font/Times-Bold-iso-8859-1.php";s:4:"a5b6";s:49:"html2ps/fpdf/font/Times-BoldItalic-iso-8859-1.php";s:4:"56ac";s:45:"html2ps/fpdf/font/Times-Italic-iso-8859-1.php";s:4:"69c6";s:44:"html2ps/fpdf/font/Times-Roman-iso-8859-1.php";s:4:"839c";s:45:"html2ps/fpdf/font/Times-Roman-iso-8859-15.php";s:4:"82a1";s:25:"html2ps/fpdf/font/arial.z";s:4:"cfac";s:27:"html2ps/fpdf/font/arialbd.z";s:4:"01a4";s:27:"html2ps/fpdf/font/arialbi.z";s:4:"4861";s:26:"html2ps/fpdf/font/ariali.z";s:4:"842d";s:24:"html2ps/fpdf/font/cour.z";s:4:"1f2b";s:26:"html2ps/fpdf/font/courbd.z";s:4:"224f";s:25:"html2ps/fpdf/font/couri.z";s:4:"ad19";s:25:"html2ps/fpdf/font/times.z";s:4:"2007";s:27:"html2ps/fpdf/font/timesbd.z";s:4:"d13f";s:27:"html2ps/fpdf/font/timesbi.z";s:4:"1651";s:26:"html2ps/fpdf/font/timesi.z";s:4:"1067";s:37:"html2ps/fpdf/font/makefont/cp1250.map";s:4:"8a02";s:37:"html2ps/fpdf/font/makefont/cp1251.map";s:4:"ee2f";s:37:"html2ps/fpdf/font/makefont/cp1252.map";s:4:"8d73";s:37:"html2ps/fpdf/font/makefont/cp1253.map";s:4:"9073";s:37:"html2ps/fpdf/font/makefont/cp1254.map";s:4:"46e4";s:37:"html2ps/fpdf/font/makefont/cp1255.map";s:4:"c469";s:37:"html2ps/fpdf/font/makefont/cp1257.map";s:4:"fe87";s:37:"html2ps/fpdf/font/makefont/cp1258.map";s:4:"86a4";s:36:"html2ps/fpdf/font/makefont/cp874.map";s:4:"4fba";s:41:"html2ps/fpdf/font/makefont/iso-8859-1.map";s:4:"53bf";s:42:"html2ps/fpdf/font/makefont/iso-8859-11.map";s:4:"83ec";s:42:"html2ps/fpdf/font/makefont/iso-8859-15.map";s:4:"3d09";s:42:"html2ps/fpdf/font/makefont/iso-8859-16.map";s:4:"b56b";s:41:"html2ps/fpdf/font/makefont/iso-8859-2.map";s:4:"4750";s:41:"html2ps/fpdf/font/makefont/iso-8859-4.map";s:4:"0355";s:41:"html2ps/fpdf/font/makefont/iso-8859-5.map";s:4:"82a2";s:41:"html2ps/fpdf/font/makefont/iso-8859-7.map";s:4:"d071";s:41:"html2ps/fpdf/font/makefont/iso-8859-9.map";s:4:"8647";s:37:"html2ps/fpdf/font/makefont/koi8-r.map";s:4:"04f5";s:37:"html2ps/fpdf/font/makefont/koi8-u.map";s:4:"9046";s:39:"html2ps/fpdf/font/makefont/makefont.php";s:4:"2cf0";s:37:"html2ps/fpdf/font/makefont/symbol.map";s:4:"1a58";s:21:"html2ps/help/api.html";s:4:"d88c";s:25:"html2ps/help/calling.html";s:4:"d3d2";s:31:"html2ps/help/configuration.html";s:4:"c93a";s:28:"html2ps/help/directives.html";s:4:"5454";s:21:"html2ps/help/faq.html";s:4:"2f09";s:23:"html2ps/help/forms.html";s:4:"2a8d";s:27:"html2ps/help/howto_afm.html";s:4:"7cc6";s:29:"html2ps/help/howto_fonts.html";s:4:"5c3b";s:23:"html2ps/help/index.html";s:4:"9bff";s:25:"html2ps/help/install.html";s:4:"d9a5";s:30:"html2ps/help/requirements.html";s:4:"bb07";s:25:"html2ps/help/css/help.css";s:4:"d429";s:34:"html2ps/help/samples/headfoot.html";s:4:"53ae";s:33:"html2ps/help/UML/Data_filters.PNG";s:4:"8f10";s:33:"html2ps/help/UML/Destinations.PNG";s:4:"b0b5";s:29:"html2ps/help/UML/Fetchers.PNG";s:4:"7f8f";s:35:"html2ps/help/UML/Layout_engines.PNG";s:4:"ef5a";s:35:"html2ps/help/UML/Output_drivers.PNG";s:4:"74df";s:35:"html2ps/help/UML/Output_filters.PNG";s:4:"4b85";s:28:"html2ps/help/UML/Parsers.PNG";s:4:"1f3a";s:33:"html2ps/help/UML/Post_filters.PNG";s:4:"4095";s:32:"html2ps/help/UML/Pre_filters.PNG";s:4:"a8d8";s:22:"html2ps/out/index.html";s:4:"d917";s:22:"html2ps/temp/dummy.txt";s:4:"c90e";s:35:"html2ps/templates/cannot_parse.html";s:4:"41d1";s:39:"html2ps/templates/error._connection.tpl";s:4:"a7be";s:35:"html2ps/templates/error._footer.tpl";s:4:"2395";s:35:"html2ps/templates/error._header.tpl";s:4:"6af4";s:33:"html2ps/templates/error._http.tpl";s:4:"0e5d";s:40:"html2ps/templates/error._missing_afm.tpl";s:4:"47cb";s:40:"html2ps/templates/error._no_fetchers.tpl";s:4:"ff8d";s:38:"html2ps/templates/error._redirects.tpl";s:4:"5bae";s:32:"html2ps/templates/error_exec.tpl";s:4:"6fd5";s:35:"html2ps/templates/missing_exec.html";s:4:"cede";s:33:"html2ps/templates/missing_gs.html";s:4:"9a98";s:37:"html2ps/templates/missing_pdflib.html";s:4:"b6bc";s:40:"html2ps/templates/missing_url_fopen.html";s:4:"a0b8";}',
);

?>