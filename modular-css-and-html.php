<!DOCTYPE html>
<head>
	<title></title>
	<!-- Hightlight.js code highlighting -->
	<link rel="stylesheet" href="bower_components/highlightjs/styles/obsidian.css">
	<script src="bower_components/highlightjs/highlight.pack.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	<!-- Site SCSS build -->
	<link rel="stylesheet" href="build/css/main.css">


</head>
<body>
	<div id="hero-mast" class="jumbotron">
        <div class="container">
            <h1>Coding Guidlines</h1>
            <p>Some best-practice rules to follow when writing Front-End code for internal &amp; external Clark projects.</p>
        </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
                <ul class="documentation-nav nav nav-stacked">
                    <li><a href="#">Syntax formatting and spacing</a></li>
                    <li><a href="#">Selector grouping</a></li>
                    <li><a href="#">Property order</a></li>
                    <li><a href="#">Quotes</a></li>
                    <li><a href="#">Numbers</a></li>
                </ul>
			</div>
			<div class="col-md-9">
                <section class="page-section documentation-section">
                    <h1 class="page-header">Modular CSS/HTML Design</h1>

                    <p>There was a time when it was widely taught that creating presentational class names and littering your markup with things like <code>.green-button</code> and <code>.left-sidebar</code> were bad design practices. Although poorly-excecuted names like those are still a bad idea, many at the forefront of the industry have stepped back from the notion that using presentational classes in markup is such a terrible thing.</p>
                    <p>Designing and coding for a large site requires a level of scalability, and removing content-specific namespacing from the classes in your markup can be advantageous in creating code that's usable and extendable. Always have the assumption that what you're building will be reused somewhere else with content that could be entirely unrelated to what it was originally made for. For that reason, avoid using feature-specific, or page-specific classnames when possible.</p>

                    <h2>Feature-agnostic class names</h2>

                    <blockquote cite="http://nicolasgallagher.com/about-html-semantics-front-end-architecture/">
                        <p>The most reusable components are those with class names that are independent of the content.</p>
                        <footer class="">Nicolas Gallagher, <a href="http://nicolasgallagher.com/about-html-semantics-front-end-architecture/"><cite title="Source Title">About HTML semantics and front-end architecture</cite></a></footer>
                    </blockquote>

                    <p>Avoid using feature-specific names in your classes. Something like <code>.blog-article-masthead</code> is a lot less usable than <code>.large-media-block</code>. Perhaps down the road that same design will be used for a product category page header&mdash;That would require complex <code>@extend</code> rules, or manually adding a new selector to the stylesheet (and repeat every time it's used again), or using a class in markup that refers to a completely seperate part of the site (yuck).</p>

                    <pre><code class="scss">// Bad
.blog-article-masthead {
    ...
}

// Good
.large-media-block {
    ...
}</code></pre>


                    <p></p>

                    <div class="well">
                        <div class="well-header">
                            <strong>Suggested Reading</strong>
                        </div>
                        <ul>
                            <li>Nicolas Gallagher, <a href="http://nicolasgallagher.com/about-html-semantics-front-end-architecture/">About HTML semantics and front-end architecture</a></li>
                            <li>Jonathan Snook, <a href="https://smacss.com">Scalable and Modular Architecture for CSS</a></li>
                        </ul>
                    </div>

                </section>

			</div><!-- column -->
		</div>
	</div>


</body>
</html>
