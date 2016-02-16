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
                    <li><a href="#">Units</a></li>
                    <li><a href="#">Color values</a></li>
                    <li><a href="#">Writing SCSS</a></li>
                    <li><a href="#">Nesting selectors</a></li>
                    <li><a href="#">Extend rules</a></li>
                    <li><a href="#">Selector specificity</a></li>
                    <li><a href="#">Avoid over-specifying</a></li>
                    <li><a href="#">HTML Guidelines</a></li>
                    <li><a href="#">General formatting</a></li>
                    <li><a href="#">Boolean attributes</a></li>
                </ul>
			</div>
			<div class="col-md-9">
                <section class="page-section">
                    <h1 class="page-header">SCSS/CSS Guidelines</h1>
                    <h2>Syntax formatting and spacing</h2>
                    <div class="content-chunk">
                        <p>To make sure we're all writing similarly-readable code we want to try to format our as so:</p>
                        <ul>
                            <li>Use four space indents (&ldquo;soft tabs&rdquo;) rather than tabs (&ldquo;hard tabs&rdquo;)</li>
                            <li>Put spaces after <code>:</code> in property declarations.</li>
                            <li>Put spaces before <code>{</code> in rule declarations.</li>
                            <li>Put an empty line bewtween rule declarations.</li>
                        </ul>

                        <pre><code>.thing {
    display: block;
    overflow: hidden;
    padding: 0 1em;
}

.other-thing {
    display: inline-block;
    padding: 0 1em;
}</code></pre>
                    </div>
                    <div class="content-chunk">
                        <h3>Selector grouping</h3>
                        <p>When grouping selectors, keep individual selectors to a single line.</p>
                        <pre><code>.thing,
.other-thing,
.other-other-thing {
    display: block;
    overflow: hidden;
    padding: 0 1em;
}</code></pre>

                    </div>

                    <div class="content-chunk">
                        <h3>Property order</h3>

                        <p>The goal here is to group related properties with eachother. <a href="https://github.com/necolas/idiomatic-css">Idiomatic CSS</a> suggests the following:</p>
                        <pre><code>.selector {
    /* Positioning */
    position: absolute;
    z-index: 10;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;

    /* Display &amp; Box Model */
    display: inline-block;
    overflow: hidden;
    box-sizing: border-box;
    width: 100px;
    height: 100px;
    padding: 10px;
    border: 10px solid #333;
    margin: 10px;

    /* Other */
    background: #000;
    color: #fff;
    font-family: sans-serif;
    font-size: 16px;
    text-align: right;
}</code></pre>

                    </div>

                    <div class="content-chunk">
                        <h3>Quotes</h3>
                        <p>When possible use double quotes to wrap strings</p>
                        <pre><code>background-image: url("/images/kittens.jpg");</code></pre>
                    </div>

                    <div class="content-chunk">
                        <h3>Numbers</h3>
                        <p>Avoid using unnessesary zeros.</p>
                        <pre><code>// Yes
.thing {
    padding: 1rem;
    opacity: .5rem;
}

// No
.thing {
    padding: 1.0rem;
    opacity: 0.5rem;
}</code></pre>

                        <p></p>
                    </div>

                    <div class="content-chunk">
                        <h3>Units</h3>
                        <p>0 value should never ever have a unit.</p>
                        <pre><code>// Yes
margin: 0;

// No
margin: 0px;</code></pre>
                        </div>
                        <div class="content-chunk">
                            <h3>Color values</h3>
                            <ul>
                                <li>Avoid using CSS color nicknames like <code>blue</code> and <code>red</code>.</li>
                                <li>Use hex color codes like <code>#fff</code>, or <code>rgba()</code>.</li>
                                <li>Utilize Sass' <code>rgba(#000, .5)</code> function for adding alpha to a hex color code.</li>
                                <li>Avoid naming global variables after their appearance (good: <code>$brand-primary-color</code>, bad: <code>$blue</code>).</li>
                            </ul>
                            <pre><code>.thing {
    color: #333;
    border: 1px solid rgba(#000, .2);
}</code></pre>
                        </div>

                        <h2>Writing SCSS</h2>
                        <p>Many of the amazingly powerful features of Sass come with equally significant downfalls if used wrecklessly. Be aware of those things and plan accordingly.</p>
                        <div class="content-chunk">
                            <h3>Nesting selectors</h3>
                            <p>Selector nesting in Sass is a feature that's often used based on convenience rather than intention. It's easy to create a selector explosion by nesting as much as possible without thought as to what CSS is required to perform the same thing.</p>
                            <p>A popular convention is to limit nesting to 3 levels deep:</p>
                            <pre class="block"><code class="scss">.parent {
    ...
    .child {
        ...
        .grandchild {
            ...
        }
    }
}</code></pre>
                            <p>If you're feeling constrained by the 3 level rule, consider using more descriptive class names.</p>
                            <pre><code>// Bad
.product {
    ...
    .description {
        ...
        .date {
            ...
        }
    }
}

// Good
.product {
    ...
}

.product-description {
    ...
}

.product-date {
    ...
}</code></pre>

                                <h3>Extend rules</h3>
                                <p><code>@extend</code> rules are one of the most powerful Sass tools for writing modular and flexible CSS, but they come with a price. If you allow them to get out of control, they can multiply the amount of CSS created by your Sass very quickly. Practice these guidelines when using <code>@extend</code> :</p>
                                <ul>
                                    <li>Avoid extending classes that have nested rules or complex selectors.</li>
                                    <li>Avoid extending global classes that are likely to be used frequently accross the project.</li>
                                    <li>Use <a href="http://thesassway.com/intermediate/understanding-placeholder-selectors">placeholder classes</a> when possible.</li>
                                </ul>

                            </div><!-- chunk -->


                            <h3>Selector specificity</h3>
                            <p>Use ID selectors extremely sparingly (or not at all) to avoid specificity conflicts. </p>
                            <h3>Avoid over-specifying</h3>
                            <p>Strive to limit use of shorthand declarations to instances where you must explicitly set all the available values.</p>
                            <pre><code class="scss">// Good
.thing {
    margin-bottom: 1rem;
}

// Bad
.thing {
    margin: 0 0 1rem 0;
}</code></pre>

                </section>
                <section>
                    <h1 class="page-header">HTML Guidelines</h1>
                    <h2>General formatting</h2>
                    <ul>
                        <li>Use soft-tabs with a four space indent.</li>
                        <li>Paragraphs of text should always be placed in a <code>&lt;p&gt;</code> tag. Never use multiple &lt;br&gt; tags.</li>
                        <li>Avoid trailing slashes in self-closing elements like <code>&lt;br&gt;</code>, <code>&lt;hr&gt;</code>, <code>&lt;img&gt;</code>, and <code>&lt;input&gt;</code>.</li>
                    </ul>
                    <h3>Boolean attributes</h3>
                    <p>Many attributes don't require a value to be set, like disabled or checked, so don't set them.</p>
                    <pre><code class="php">&lt;input type="text" disabled&gt;
&lt;input type="checkbox" value="1" checked&gt;</code></pre>

                </section>
			</div><!-- column -->
		</div>
	</div>


</body>
</html>
