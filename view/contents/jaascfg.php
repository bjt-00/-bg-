<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<title>How to Configure JAAS on JBoss..?</title>
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 14">
<meta name=Originator content="Microsoft Word 14">
<link rel=File-List
href="jaascfg/filelist.xml">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Abdul Kareem</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>Abdul Kareem</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>94</o:TotalTime>
  <o:Created>2012-03-15T07:41:00Z</o:Created>
  <o:LastSaved>2012-03-15T07:41:00Z</o:LastSaved>
  <o:Pages>3</o:Pages>
  <o:Words>619</o:Words>
  <o:Characters>3531</o:Characters>
  <o:Lines>29</o:Lines>
  <o:Paragraphs>8</o:Paragraphs>
  <o:CharactersWithSpaces>4142</o:CharactersWithSpaces>
  <o:Version>14.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<link rel=themeData
href="jaascfg/themedata.thmx">
<link rel=colorSchemeMapping
href="jaascfg/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:EnableOpenTypeKerning/>
   <w:DontFlipMirrorIndents/>
   <w:OverrideTableStyleHps/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
   UnhideWhenUsed="false" Name="Table Grid"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
@font-face
	{font-family:Verdana;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-1593833729 1073750107 16 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:10.0pt;
	line-height:115%;}
@page WordSection1
	{size:8.5in 11.0in;
	margin:1.0in 1.0in 1.0in 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:10.0pt;
	mso-para-margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in'>

<div class=WordSection1>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:18.0pt;mso-bidi-font-size:11.0pt;line-height:115%'>How to
Configure JAAS on <span class=SpellE>JBoss</span>..?<o:p></o:p></span></b></p>

<p class=MsoNormal><span style='color:#A6A6A6;mso-themecolor:background1;
mso-themeshade:166'>By: Abdul Kareem (bitguiders@gmail.com)<o:p></o:p></span></p>
<a href='index.php?action=training'><<<</a>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:13.0pt;mso-bidi-font-size:11.0pt;line-height:115%'>Note: </span></b><i
style='mso-bidi-font-style:normal'><span style='font-size:12.0pt;mso-bidi-font-size:
11.0pt;line-height:115%'>follow color schemes to <span class=GramE>track <span
style='mso-spacerun:yes'> </span><b style='mso-bidi-font-weight:normal'>variables</b></span><b
style='mso-bidi-font-weight:normal'> </b>references <span
style='mso-spacerun:yes'> </span>in the whole JAAS configuration in this
document such as </span></i><b style='mso-bidi-font-weight:normal'><span
style='font-size:9.0pt;mso-bidi-font-size:10.0pt;line-height:115%;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New";color:#0070C0'>bitguiders_DS
, </span></b><span class=SpellE><b style='mso-bidi-font-weight:normal'><i><span
style='font-size:10.0pt;line-height:115%;font-family:"Courier New";color:red'>umDomain</span></i></b></span><b
style='mso-bidi-font-weight:normal'><i><span style='font-size:10.0pt;
line-height:115%;font-family:"Courier New";color:red'> </span></i></b><span
class=SpellE><i><span style='font-size:10.0pt;line-height:115%;font-family:
"Courier New"'>etc</span></i></span><b style='mso-bidi-font-weight:normal'><span
style='font-size:9.0pt;mso-bidi-font-size:10.0pt;line-height:115%;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New";color:#0070C0'> </span></b><i
style='mso-bidi-font-style:normal'><span style='font-size:12.0pt;mso-bidi-font-size:
11.0pt;line-height:115%'>.</span></i><b style='mso-bidi-font-weight:normal'><span
style='font-size:13.0pt;mso-bidi-font-size:11.0pt;line-height:115%'><o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:13.0pt;mso-bidi-font-size:11.0pt;line-height:115%'>Step I:<o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'>Data Source<o:p></o:p></b></p>

<p class=MsoNormal>jboss-6.x.x\server\default\deploy\<b style='mso-bidi-font-weight:
normal'>xxxx-ds.xml<o:p></o:p></b></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>local-<span
class=SpellE>tx</span>-<span class=SpellE>datasource</span></span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-spacerun:yes'>  
</span></span><span style='font-size:10.0pt;font-family:"Courier New";
color:teal'>&lt;</span><span class=SpellE><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>jndi</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><b
style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;mso-bidi-font-size:
10.0pt;font-family:"Verdana","sans-serif";mso-bidi-font-family:"Courier New";
color:#0070C0'>bitguiders_DS</span></b><span style='font-size:10.0pt;font-family:"Courier New";
color:teal'>&lt;/</span><span class=SpellE><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>jndi</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>connection-url</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>jdbc<span
class=GramE>:postgresql</span>://localhost:5432/</span><b style='mso-bidi-font-weight:
normal'><span style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New"'>db_name</span></b><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>connection-url</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>driver-class</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
class=SpellE><span style='font-size:10.0pt;font-family:"Courier New";
color:black'>org.postgresql.Driver</span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>driver-class</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>user-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>username</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>user-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>        </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>password</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>password</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>password</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>local-<span
class=SpellE>tx</span>-<span class=SpellE>datasource</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'>---------------------------------------------------------------</p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:13.0pt;mso-bidi-font-size:11.0pt;line-height:115%'>Step 2:<o:p></o:p></span></b></p>

<p class=MsoNormal>Copy &amp; Paste </p>

<p class=MsoNormal>jboss-6.x.x\server\default\<span class=SpellE>conf</span> \ <b
style='mso-bidi-font-weight:normal'>login-config.xml<o:p></o:p></b></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:
10.0pt;font-family:"Courier New";color:#3F7F7F'>application-policy</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>name</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;</span><span
class=SpellE><b style='mso-bidi-font-weight:normal'><span style='color:red'>umDomain</span></b></span><span
style='color:#2A00FF'>&quot;</span></i><span style='color:teal'>&gt;</span><span
style='color:black'> </span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>authentication</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'> </span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>        </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>login-module</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>code</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;<span
class=SpellE>org.jboss.security.auth.spi.DatabaseServerLoginModule</span>&quot;</span></i>
<span style='color:#7F007F'>flag</span><span style='color:black'>=</span><i><span
style='color:#2A00FF'>&quot;required&quot;</span></i><span style='color:teal'>&gt;</span><span
style='color:black'> </span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>module-option</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>name</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;<span
class=SpellE>dsJndiName</span>&quot;</span></i><span style='color:teal'>&gt;</span><span
style='color:black'>java<span class=GramE>:/</span></span></span><b
style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;mso-bidi-font-size:
10.0pt;font-family:"Verdana","sans-serif";mso-bidi-font-family:"Courier New";
color:#0070C0'> bitguiders_DS</span></b><span style='font-size:10.0pt;font-family:
"Courier New";color:teal'> &lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>module-option</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'> </span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>module-option</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>name</span>
<span style='color:black'>=</span> <i><span style='color:#2A00FF'>&quot;<span
class=SpellE>principalsQuery</span>&quot;</span></i><span style='color:teal'>&gt;</span><span
style='color:black'>SELECT password FROM user WHERE username=<span class=GramE>?<span
style='color:teal'>&lt;</span></span></span><span style='color:teal'>/</span><span
style='color:#3F7F7F'>module-option</span><span style='color:teal'>&gt;</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>module-option</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>name</span>
<span style='color:black'>=</span> <i><span style='color:#2A00FF'>&quot;<span
class=SpellE>rolesQuery</span>&quot;</span></i><span style='color:teal'>&gt;</span><span
style='color:black'>select role, </span></span><b style='mso-bidi-font-weight:
normal'><span style='font-size:9.0pt;mso-bidi-font-size:10.0pt;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New"'>'Roles'</span></b><span
style='font-size:10.0pt;font-family:"Courier New";color:black'> from user where
username=<span class=GramE>?<span style='color:teal'>&lt;</span></span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>module-option</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>        </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>login-module</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'> </span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>authentication</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'> </span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>application-policy</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'> </span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'>Note: </b><span
style='mso-spacerun:yes'> </span><i style='mso-bidi-font-style:normal'>word </i><b
style='mso-bidi-font-weight:normal'><i style='mso-bidi-font-style:normal'><span
style='font-size:9.0pt;mso-bidi-font-size:10.0pt;line-height:115%;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New"'>'Roles' </span></i></b><i
style='mso-bidi-font-style:normal'><span style='font-size:10.0pt;line-height:
115%;font-family:"Courier New";color:black'>used in “</span></i><span
class=SpellE><i><span style='font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:#2A00FF'>rolesQuery</span></i></span><i style='mso-bidi-font-style:
normal'><span style='font-size:10.0pt;line-height:115%;font-family:"Courier New";
color:black'>” is important by removing this JAAS will not work.</span><u><o:p></o:p></u></i></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=SpellE><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;font-family:
"Courier New";color:gray;mso-themecolor:background1;mso-themeshade:128'>Note<span
class=GramE>:<span style='font-weight:normal'>For</span></span></span></b></span><span
style='font-size:10.0pt;font-family:"Courier New";color:gray;mso-themecolor:
background1;mso-themeshade:128'> File based authentication use this section
otherwise skip it.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:gray;mso-themecolor:
background1;mso-themeshade:128'>create</span></span><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'> two property files<span style='mso-spacerun:yes'> 
</span>&amp; place your users and roles in these files<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:gray;mso-themecolor:background1;mso-themeshade:128'>1: </span><span
style='color:gray;mso-themecolor:background1;mso-themeshade:128'>jboss-6.x.x\server\default\<span
class=SpellE>conf</span> \props\ <b style='mso-bidi-font-weight:normal'>my-<span
class=SpellE>users.properties</span><o:p></o:p></b></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'># <span class=GramE>A</span> sample <span class=SpellE>users.properties</span>
file for use with the <span class=SpellE>UsersRolesLoginModule</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:gray;mso-themecolor:
background1;mso-themeshade:128'>admin=</span></span><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'>admin<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:gray;mso-themecolor:
background1;mso-themeshade:128'>user=</span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:gray;mso-themecolor:background1;mso-themeshade:
128'>user<o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:gray;mso-themecolor:background1;mso-themeshade:128'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:gray;mso-themecolor:background1;mso-themeshade:128'>2: </span><span
style='color:gray;mso-themecolor:background1;mso-themeshade:128'>jboss-6.x.x\server\default\<span
class=SpellE>conf</span> \props\ <b style='mso-bidi-font-weight:normal'>my-<span
class=SpellE>roles.properties</span><o:p></o:p></b></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'># <span class=GramE>A</span> sample <span class=SpellE>roles.properties</span>
file for use with the <span class=SpellE>UsersRolesLoginModule</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:gray;mso-themecolor:
background1;mso-themeshade:128'>admin=</span></span><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'>Administrator<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:gray;mso-themecolor:
background1;mso-themeshade:128'>user=</span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:gray;mso-themecolor:background1;mso-themeshade:
128'>User<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:#3F5FBF'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'>&lt;!—<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'>&lt;application-policy name=&quot;<span class=SpellE>umDomain</span>&quot;&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'>  </span>&lt;<span
class=GramE>authentication</span>&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'>    </span>&lt;login-module
code=&quot;<span class=SpellE>org.jboss.security.auth.spi.UsersRolesLoginModule</span>&quot;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'>      </span><span
class=GramE>flag</span>=&quot;required&quot;&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'>      </span>&lt;<span
class=GramE>module-option</span> name=&quot;<span class=SpellE>usersProperties</span>&quot;&gt;props/my-<span
class=SpellE>users.properties</span>&lt;/module-option&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'>       </span>&lt;<span
class=GramE>module-option</span> name=&quot;<span class=SpellE>rolesProperties</span>&quot;&gt;props/my-<span
class=SpellE>roles.properties</span>&lt;/module-option&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'>     
</span>&lt;/login-module&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'>   
</span>&lt;/authentication&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><span style='mso-spacerun:yes'> 
</span>&lt;/application-policy&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'>--&gt;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:gray;mso-themecolor:background1;
mso-themeshade:128'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'>---------------------------------------------------------------</p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:13.0pt;mso-bidi-font-size:11.0pt;line-height:115%'>Step 3:<o:p></o:p></span></b></p>

<p class=MsoNormal>Copy &amp; Paste</p>

<p class=MsoNormal>‘WEB-INF \ <b style='mso-bidi-font-weight:normal'>jboss-web.xml’<o:p></o:p></b></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;?</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>xml</span></span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>version</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;1.0&quot;</span></i>
<span style='color:#7F007F'>encoding</span><span style='color:black'>=</span><i><span
style='color:#2A00FF'>&quot;UTF-8&quot;</span></i><span style='color:teal'>?&gt;</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span class=SpellE><span
class=GramE><span style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>jboss</span></span></span><span
class=GramE><span style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>-web</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>security-domain</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>java<span
class=GramE>:/</span><span class=SpellE>jaas</span>/</span><span class=SpellE><b
style='mso-bidi-font-weight:normal'><i><span style='font-size:10.0pt;
font-family:"Courier New";color:red'>umDomain</span></i></b></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>security-domain</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>context-root</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>/<span
class=SpellE>yourcontext</span></span><span style='font-size:10.0pt;font-family:
"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;font-family:
"Courier New";color:#3F7F7F'>context-root</span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:teal'>&lt;/</span><span class=SpellE><span
style='font-size:10.0pt;line-height:115%;font-family:"Courier New";color:#3F7F7F'>jboss</span></span><span
style='font-size:10.0pt;line-height:115%;font-family:"Courier New";color:#3F7F7F'>-web</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Courier New";color:teal'>&gt;</span></p>

<p class=MsoNormal align=center style='text-align:center'>---------------------------------------------------------------</p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:13.0pt;mso-bidi-font-size:11.0pt;line-height:115%'>Step 4:<o:p></o:p></span></b></p>

<p class=MsoNormal>Copy &amp; Paste</p>

<p class=MsoNormal>Copy this given code in ‘WEB-INF/ <b style='mso-bidi-font-weight:
normal'>web.xml’</b></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F5FBF'>&lt;!--</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F5FBF'> Security
start --&gt;</span><span style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-spacerun:yes'>  
</span></span><span style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>     </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>security-constraint</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:2'>           </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>display-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New";color:#17365D;
mso-themecolor:text2;mso-themeshade:191'>User</span></b><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>display-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:3'>                 </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
class=GramE><span style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>web-resource-collection</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:3'>                 </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>web-resource-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
class=SpellE><span style='font-size:10.0pt;font-family:"Courier New";
color:black'>public_pages</span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>web-resource-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:2'>           </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>description</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>/&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:2'>           </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
class=SpellE><span style='font-size:10.0pt;font-family:"Courier New";
color:#3F7F7F'>url</span></span><span style='font-size:10.0pt;font-family:"Courier New";
color:#3F7F7F'>-pattern</span><span style='font-size:10.0pt;font-family:"Courier New";
color:teal'>&gt;</span><span style='font-size:10.0pt;font-family:"Courier New";
color:black'>/view/user/*</span><span style='font-size:10.0pt;font-family:"Courier New";
color:teal'>&lt;/</span><span class=SpellE><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>url</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>-pattern</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>GET</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>POST</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>HEAD</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>PUT</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>OPTIONS</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>TRACE</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>DELETE</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>http-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>web-resource-collection</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span class=SpellE><span
class=GramE><span style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>auth</span></span></span><span
class=GramE><span style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>-constraint</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:3'>                  </span><span
style='mso-spacerun:yes'> </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>description</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>/&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:2'>           </span></span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:4'>                       </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>role-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New";color:#17365D;
mso-themecolor:text2;mso-themeshade:191'> User</span></b><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'> &lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>role-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:2'>           </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
class=SpellE><span style='font-size:10.0pt;font-family:"Courier New";
color:#3F7F7F'>auth</span></span><span style='font-size:10.0pt;font-family:
"Courier New";color:#3F7F7F'>-constraint</span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:2'>           </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
class=GramE><span style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>user-data-constraint</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:3'>                 </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>description</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>/&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:3'>                  </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>transport-guarantee</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>NONE</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>transport-guarantee</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'> </span><span style='mso-tab-count:2'>           </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>user-data-constraint</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-spacerun:yes'>  
</span></span><span style='font-size:10.0pt;font-family:"Courier New";
color:teal'>&lt;/</span><span style='font-size:10.0pt;font-family:"Courier New";
color:#3F7F7F'>security-constraint</span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>     </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>login-<span
class=SpellE>config</span></span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
class=SpellE><span style='font-size:10.0pt;font-family:"Courier New";
color:#3F7F7F'>auth</span></span><span style='font-size:10.0pt;font-family:
"Courier New";color:#3F7F7F'>-method</span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:black'>FORM</span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span class=SpellE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>auth</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>-method</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>realm-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
class=SpellE><b style='mso-bidi-font-weight:normal'><i><span style='font-size:
10.0pt;font-family:"Courier New";color:red'>umDomain</span></i></b></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>realm-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
class=GramE><span style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>form-login-<span
class=SpellE>config</span></span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:
10.0pt;font-family:"Courier New";color:#3F7F7F'>form-login-page</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>/<span
class=SpellE>SignInForm.jsp</span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>form-login-page</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:
10.0pt;font-family:"Courier New";color:#3F7F7F'>form-error-page</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>/<span
class=SpellE>SignInFailed.jsp</span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>form-error-page</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:2'>            </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>form-login-<span
class=SpellE>config</span></span><span style='font-size:10.0pt;font-family:
"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;font-family:
"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:1'>      </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>login-<span
class=SpellE>config</span></span><span style='font-size:10.0pt;font-family:
"Courier New";color:teal'>&gt;</span><span style='font-size:10.0pt;font-family:
"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>security-role</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>        </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span class=GramE><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>description</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:black'>Application user</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>description</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>        </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>role-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;font-family:
"Verdana","sans-serif";mso-bidi-font-family:"Courier New";color:#17365D;
mso-themecolor:text2;mso-themeshade:191'> User</span></b><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'> &lt;/</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>role-name</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>    </span></span><span style='font-size:10.0pt;
font-family:"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;
font-family:"Courier New";color:#3F7F7F'>security-role</span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&gt;</span><span
style='font-size:10.0pt;font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span
style='mso-spacerun:yes'>     </span></span><span style='font-size:10.0pt;
font-family:"Courier New"'><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'>---------------------------------------------------------------</p>

<p class=MsoNormal>Copy &amp; Paste</p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:12.0pt;mso-bidi-font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:black'>/<span class=SpellE>SignInForm.jsp</span><o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span style='font-size:
10.0pt;font-family:"Courier New";color:#3F7F7F;background:lightgrey;mso-highlight:
lightgrey'>form</span><span style='font-size:10.0pt;font-family:"Courier New"'>
<span style='color:#7F007F'>method</span><span style='color:black'>=</span><i><span
style='color:#2A00FF'>&quot;post&quot;</span></i> <span style='color:#7F007F'>action</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;<span
class=SpellE>j_security_check</span>&quot;</span></i><span style='color:teal'>&gt;</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:1'>      </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>input</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>type</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;text&quot;</span></i>
<span style='color:#7F007F'>name</span><span style='color:black'>=</span><i><span
style='color:#2A00FF'>&quot;<span class=SpellE>j_username</span>&quot;</span></i>
<span style='color:teal'>/&gt;</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:1'>      </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>input</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>type</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;password&quot;</span></i>
<span style='color:#7F007F'>name</span><span style='color:black'>=</span><i><span
style='color:#2A00FF'>&quot;<span class=SpellE>j_password</span>&quot;</span></i>
<span style='color:teal'>/&gt;</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal;mso-layout-grid-align:none;text-autospace:none'><span style='font-size:
10.0pt;font-family:"Courier New";color:black'><span style='mso-tab-count:1'>      </span></span><span
style='font-size:10.0pt;font-family:"Courier New";color:teal'>&lt;</span><span
style='font-size:10.0pt;font-family:"Courier New";color:#3F7F7F'>input</span><span
style='font-size:10.0pt;font-family:"Courier New"'> <span style='color:#7F007F'>type</span><span
style='color:black'>=</span><i><span style='color:#2A00FF'>&quot;submit&quot;</span></i>
<span style='color:#7F007F'>value</span><span style='color:black'>=</span><i><span
style='color:#2A00FF'>&quot;Login&quot;</span></i> <span style='color:teal'>/&gt;</span><o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:teal'>&lt;/</span><span style='font-size:10.0pt;line-height:
115%;font-family:"Courier New";color:#3F7F7F;background:lightgrey;mso-highlight:
lightgrey'>form</span><span style='font-size:10.0pt;line-height:115%;
font-family:"Courier New";color:teal'>&gt;<o:p></o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:115%;font-family:"Verdana","sans-serif";
mso-bidi-font-family:"Courier New"'>Note: </span></b><span style='font-size:
8.0pt;mso-bidi-font-size:10.0pt;line-height:115%;font-family:"Verdana","sans-serif";
mso-bidi-font-family:"Courier New"'>‘</span><span class=SpellE><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;line-height:
115%;font-family:"Verdana","sans-serif";mso-bidi-font-family:"Courier New";
color:black'>SignInForm.jsp</span></b></span><span style='font-size:10.0pt;
line-height:115%;font-family:"Verdana","sans-serif";mso-bidi-font-family:"Courier New";
color:black'>’ should neither access directly from <span class=SpellE><span
class=GramE>url</span></span> nor it should redirect. Its declaration in
web.xml is enough.</span><b style='mso-bidi-font-weight:normal'><span
style='font-size:12.0pt;mso-bidi-font-size:10.0pt;line-height:115%;font-family:
"Courier New";color:black'><o:p></o:p></span></b></p>

</div>
<a href='index.php?action=training'><<<</a>

</body>

</html>
