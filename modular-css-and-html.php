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
                <?php include "resources/php/documentation-nav.php" ?>
			</div>
			<div class="col-md-9">
                <section class="page-section documentation-section">
                    <h1 class="page-header">Modular CSS/HTML Design</h1>

                    <section class="is-hidden" id="introduction">
                        <h2 class="h2">Introduction</h2>
                        <p>There was a time when it was widely taught that creating presentational class names and littering your markup with things like <code>.green-button</code> and <code>.left-sidebar</code> were bad design practices. Although poorly-excecuted names like those are still a bad idea, many at the forefront of the industry have stepped back from the notion that using presentational classes in markup is such a terrible thing.</p>
                        <p>Designing and coding for a large site requires a level of scalability, and removing content-specific namespacing from the classes in your markup can be advantageous in creating code that's usable and extendable. Always have the assumption that what you're building will be reused somewhere else with content that could be entirely unrelated to what it was originally made for. For that reason, avoid using feature-specific, or page-specific classnames when possible.</p>
                    </section>

                    <section id="feature-agnostic-class-names" class="page-section">
                        <blockquote cite="http://nicolasgallagher.com/about-html-semantics-front-end-architecture/">
                            <p>The most reusable components are those with class names that are independent of the content.</p>
                            <footer class="">Nicolas Gallagher, <a href="http://nicolasgallagher.com/about-html-semantics-front-end-architecture/"><cite title="Source Title">About HTML semantics and front-end architecture</cite></a></footer>
                        </blockquote>
                        <h2>Feature-agnostic class names</h2>
                        <p>Avoid using feature-specific names in your classes. Something like <code>.blog-article-masthead</code> is a lot less usable than <code>.large-media-block</code>. Perhaps down the road that same design will be used for a product category page header&mdash;That would require complex <code>@extend</code> rules, or manually adding a new selector to the stylesheet (and repeat every time it's used again), or using a class in markup that refers to a completely seperate part of the site (yuck).</p>

                        <pre><code class="scss">// Bad
.blog-article-masthead {
    ...
}

// Good
.large-media-block {
    ...
}</code></pre>

                    </section>

                    <section id="avoid-context-specific-rules" class="page-section">
                        <h2>Avoid Context-specific rules </h2>
                        <p>Imagine you have a form component that floats a <code>&lt;label&gt;</code> next to an <code>&lt;input&gt;</code>. Perhaps you want to use that same module in a wide primary column, and again in a narrow sidebar. Since the sidebar is narrower, it will require slight modifications to the design&mdash;making the label and input stack, rather than float. It's tempting to base that tweak off of a context selector.</p>

                        <pre><code>.form-component {
    ...
    .sidebar &amp; {
        ...
    }
}</code></pre>

                        <p>The problem is that doing so creates an extra constraint to acheiving that component's design. If there's ever another situation where this layout is needed, a new selector will need to be appended to that style rule. </p>

                        <p>Instead, if we modify our base component with a modifier class, we can adjust the design as we see fit and use that anywhere in our design that we want.</p>

                        <pre><code>.form-component {
    ...
    &amp;.form-component--compact {
        ...
    }
}</code></pre>
                    </section>
                    <section id="bem-namespacing">
                        <h2>BEM Namespacing</h2>
                        <p>BEM stands for <em>Block, Element, Modifier</em>. BEM is a naming convention used to distinguish compenents, component parts or children, and component modifiers. Here's an example of a component styled and marked up with BEM classes.</p>

                        <pre><code>// the base component (block)
.product { ... }

// A child of the component ()
.product__price { ... }

// A modifier class for the component
.product--compact { ... }

// A modifier class for the component
.product__price--redacted { ... }

                        </code></pre>

                    </section>



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
