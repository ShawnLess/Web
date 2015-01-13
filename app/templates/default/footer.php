</div>

<!-- #### Footer #### -->

<div id="footer">
  <div id="footercontent">
    <p>Copyright &copy; 2014  shawnless.net 
    Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>. 
    <!-- ##### Please leave this small link back to my site. Thank You! ##### -->
    <a href="http://www.infscripts.com/">Template Designed by Inf,</a>
    <a href="http://simplemvcframework.com/php-framework">Using Simple MVC Framework</a>.</p>
  </div>

</div>

<!-- Finally, to actually run the highlighter, you need to include this JS on your page -->
<script type="text/javascript"> 
  function JSPath() {
    var args = arguments;
    return args[0].replace('@','http://www.shawnless.net/Shawn/app/templates/default/javascript/syntaxhighlighter/scripts/').split(' ');
  }
  SyntaxHighlighter.autoloader(
            JSPath('applescript @shBrushAppleScript.js'),
            JSPath('actionscript3 as3 @shBrushAS3.js'),
            JSPath('bash shell @shBrushBash.js'),
            JSPath('coldfusion cf @shBrushColdFusion.js'),
            JSPath('cpp c @shBrushCpp.js'),
            JSPath('c# c-sharp csharp @shBrushCSharp.js'),
            JSPath('css @shBrushCss.js'),
            JSPath('delphi pascal @shBrushDelphi.js'),
            JSPath('diff patch pas @shBrushDiff.js'),
            JSPath('erl erlang @shBrushErlang.js'),
            JSPath('groovy @shBrushGroovy.js'),
            JSPath('java @shBrushJava.js'),
            JSPath('jfx javafx @shBrushJavaFX.js'),
            JSPath('js jscript javascript @shBrushJScript.js'),
            JSPath('perl pl @shBrushPerl.js'),
            JSPath('php @shBrushPhp.js'),
            JSPath('text plain @shBrushPlain.js'),
            JSPath('py python @shBrushPython.js'),
            JSPath('ruby rails ror rb @shBrushRuby.js'),
            JSPath('sass scss @shBrushSass.js'),
            JSPath('scala @shBrushScala.js'),
            JSPath('sql @shBrushSql.js'),
            JSPath('vb vbnet @shBrushVb.js'),
            JSPath('xml xhtml xslt html @shBrushXml.js'),
            JSPath('xml @shBrushXml.js'))
  SyntaxHighlighter.all();
</script>

</body>
</html>
