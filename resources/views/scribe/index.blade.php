<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>CloudBasedPizza API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:30000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.5.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.5.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-customers" class="tocify-header">
                <li class="tocify-item level-1" data-unique="customers">
                    <a href="#customers">Customers</a>
                </li>
                                    <ul id="tocify-subheader-customers" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="customers-GETapi-v1-customers">
                                <a href="#customers-GETapi-v1-customers">List all customers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="customers-POSTapi-v1-customers">
                                <a href="#customers-POSTapi-v1-customers">Create a new customer

This endpoint creates a new customer using the JSON:API format.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="customers-GETapi-v1-customers--id-">
                                <a href="#customers-GETapi-v1-customers--id-">Show a single customer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="customers-PUTapi-v1-customers--id-">
                                <a href="#customers-PUTapi-v1-customers--id-">Update an existing customer

Updates the specified customer using the JSON:API format.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-orders" class="tocify-header">
                <li class="tocify-item level-1" data-unique="orders">
                    <a href="#orders">Orders</a>
                </li>
                                    <ul id="tocify-subheader-orders" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="orders-GETapi-v1-orders">
                                <a href="#orders-GETapi-v1-orders">List all pizza orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-POSTapi-v1-orders">
                                <a href="#orders-POSTapi-v1-orders">Create a new order</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETapi-v1-orders--id-">
                                <a href="#orders-GETapi-v1-orders--id-">Get a single order</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-payments" class="tocify-header">
                <li class="tocify-item level-1" data-unique="payments">
                    <a href="#payments">Payments</a>
                </li>
                                    <ul id="tocify-subheader-payments" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="payments-POSTapi-v1-payments">
                                <a href="#payments-POSTapi-v1-payments">Store a new payment record</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payments-POSTapi-v1-payments--payment_id--pay">
                                <a href="#payments-POSTapi-v1-payments--payment_id--pay">Mark a payment as successful</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="payments-POSTapi-v1-payments--payment_id--fail">
                                <a href="#payments-POSTapi-v1-payments--payment_id--fail">Mark a payment as failed</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-pizza" class="tocify-header">
                <li class="tocify-item level-1" data-unique="pizza">
                    <a href="#pizza">Pizza</a>
                </li>
                                    <ul id="tocify-subheader-pizza" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="pizza-GETapi-v1-pizzas">
                                <a href="#pizza-GETapi-v1-pizzas">List all pizzas</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="pizza-POSTapi-v1-pizzas">
                                <a href="#pizza-POSTapi-v1-pizzas">Create a new pizza with optional toppings.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="pizza-GETapi-v1-pizzas--id-">
                                <a href="#pizza-GETapi-v1-pizzas--id-">Show a single pizza</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-topping" class="tocify-header">
                <li class="tocify-item level-1" data-unique="topping">
                    <a href="#topping">Topping</a>
                </li>
                                    <ul id="tocify-subheader-topping" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="topping-GETapi-v1-toppings">
                                <a href="#topping-GETapi-v1-toppings">List all Topping</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="topping-POSTapi-v1-toppings">
                                <a href="#topping-POSTapi-v1-toppings">Create a new topping.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="topping-GETapi-v1-toppings--id-">
                                <a href="#topping-GETapi-v1-toppings--id-">Show a single topping</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: October 31, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:30000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="customers">Customers</h1>

    

                                <h2 id="customers-GETapi-v1-customers">List all customers</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-customers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/customers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/customers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-customers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;CUSTOMER_IS4MAWHCGT&quot;,
            &quot;email&quot;: &quot;john4@example.com&quot;,
            &quot;first_name&quot;: &quot;John&quot;,
            &quot;last_name&quot;: &quot;Doe&quot;,
            &quot;address&quot;: &quot;123 Main Street&quot;,
            &quot;city&quot;: &quot;New York&quot;,
            &quot;state&quot;: &quot;NY&quot;,
            &quot;created_at&quot;: 1761911084,
            &quot;updated_at&quot;: 1761911084
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-customers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-customers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-customers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-customers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-customers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-customers" data-method="GET"
      data-path="api/v1/customers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-customers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-customers"
                    onclick="tryItOut('GETapi-v1-customers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-customers"
                    onclick="cancelTryOut('GETapi-v1-customers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-customers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/customers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="customers-POSTapi-v1-customers">Create a new customer

This endpoint creates a new customer using the JSON:API format.</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-customers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:30000/api/v1/customers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/customers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-customers">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
 &quot;data&quot;: {
     &quot;id&quot;: 4
     &quot;email&quot;: &quot;john4@example.com&quot;,
     &quot;first_name&quot;: &quot;John&quot;,
     &quot;last_name&quot;: &quot;Doe&quot;,
     &quot;address&quot;: &quot;123 Main Street&quot;,
     &quot;city&quot;: &quot;New York&quot;,
     &quot;state&quot;: &quot;NY&quot;,
     &quot;updated_at&quot;: &quot;1761895592&quot;,
     &quot;created_at&quot;: &quot;1761895592&quot;,
 }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-customers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-customers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-customers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-customers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-customers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-customers" data-method="POST"
      data-path="api/v1/customers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-customers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-customers"
                    onclick="tryItOut('POSTapi-v1-customers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-customers"
                    onclick="cancelTryOut('POSTapi-v1-customers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-customers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/customers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.type"                data-endpoint="POSTapi-v1-customers"
               value="customers"
               data-component="body">
    <br>
<p>The resource type. Example: <code>customers</code></p>
                    </div>
                                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.email"                data-endpoint="POSTapi-v1-customers"
               value="john4@example.com"
               data-component="body">
    <br>
<p>The customer's email. Example: <code>john4@example.com</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.first_name"                data-endpoint="POSTapi-v1-customers"
               value="John"
               data-component="body">
    <br>
<p>The customer's first name. Example: <code>John</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.last_name"                data-endpoint="POSTapi-v1-customers"
               value="Doe"
               data-component="body">
    <br>
<p>The customer's last name. Example: <code>Doe</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.address"                data-endpoint="POSTapi-v1-customers"
               value="123 Main Street"
               data-component="body">
    <br>
<p>optional The customer's address. Example: <code>123 Main Street</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.city"                data-endpoint="POSTapi-v1-customers"
               value="New York"
               data-component="body">
    <br>
<p>optional The customer's city. Example: <code>New York</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.state"                data-endpoint="POSTapi-v1-customers"
               value="NY"
               data-component="body">
    <br>
<p>optional The customer's state. Example: <code>NY</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="customers-GETapi-v1-customers--id-">Show a single customer</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-customers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/customers/CUSTOMER_IS4MAWHCGT" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/customers/CUSTOMER_IS4MAWHCGT"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-customers--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;CUSTOMER_IS4MAWHCGT&quot;,
        &quot;email&quot;: &quot;john4@example.com&quot;,
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;address&quot;: &quot;123 Main Street&quot;,
        &quot;city&quot;: &quot;New York&quot;,
        &quot;state&quot;: &quot;NY&quot;,
        &quot;created_at&quot;: 1761911084,
        &quot;updated_at&quot;: 1761911084
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-customers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-customers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-customers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-customers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-customers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-customers--id-" data-method="GET"
      data-path="api/v1/customers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-customers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-customers--id-"
                    onclick="tryItOut('GETapi-v1-customers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-customers--id-"
                    onclick="cancelTryOut('GETapi-v1-customers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-customers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/customers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-customers--id-"
               value="CUSTOMER_IS4MAWHCGT"
               data-component="url">
    <br>
<p>The ID of the customer. Example: <code>CUSTOMER_IS4MAWHCGT</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>customer</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="customer"                data-endpoint="GETapi-v1-customers--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the customer. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="customers-PUTapi-v1-customers--id-">Update an existing customer

Updates the specified customer using the JSON:API format.</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-customers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:30000/api/v1/customers/CUSTOMER_IS4MAWHCGT" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/customers/CUSTOMER_IS4MAWHCGT"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-customers--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;email&quot;: &quot;john4@example.com&quot;,
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;address&quot;: &quot;123 Main Street&quot;,
        &quot;city&quot;: &quot;New York&quot;,
        &quot;state&quot;: &quot;NY&quot;,
        &quot;updated_at&quot;: &quot;1761895592&quot;,
        &quot;created_at&quot;: &quot;1761895592&quot;,
        &quot;id&quot;: 4
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-customers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-customers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-customers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-customers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-customers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-customers--id-" data-method="PUT"
      data-path="api/v1/customers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-customers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-customers--id-"
                    onclick="tryItOut('PUTapi-v1-customers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-customers--id-"
                    onclick="cancelTryOut('PUTapi-v1-customers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-customers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/customers/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/customers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-customers--id-"
               value="CUSTOMER_IS4MAWHCGT"
               data-component="url">
    <br>
<p>The ID of the customer. Example: <code>CUSTOMER_IS4MAWHCGT</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>customer</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="customer"                data-endpoint="PUTapi-v1-customers--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the customer to update. Example: <code>4</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.type"                data-endpoint="PUTapi-v1-customers--id-"
               value="customers"
               data-component="body">
    <br>
<p>The resource type. Example: <code>customers</code></p>
                    </div>
                                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.email"                data-endpoint="PUTapi-v1-customers--id-"
               value="john4@example.com"
               data-component="body">
    <br>
<p>The customer's email. Example: <code>john4@example.com</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.first_name"                data-endpoint="PUTapi-v1-customers--id-"
               value="John"
               data-component="body">
    <br>
<p>The customer's first name. Example: <code>John</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.last_name"                data-endpoint="PUTapi-v1-customers--id-"
               value="Doe"
               data-component="body">
    <br>
<p>The customer's last name. Example: <code>Doe</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.address"                data-endpoint="PUTapi-v1-customers--id-"
               value="123 Main Street"
               data-component="body">
    <br>
<p>optional The customer's address. Example: <code>123 Main Street</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.city"                data-endpoint="PUTapi-v1-customers--id-"
               value="New York"
               data-component="body">
    <br>
<p>optional The customer's city. Example: <code>New York</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.state"                data-endpoint="PUTapi-v1-customers--id-"
               value="NY"
               data-component="body">
    <br>
<p>optional The customer's state. Example: <code>NY</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                <h1 id="orders">Orders</h1>

    

                                <h2 id="orders-GETapi-v1-orders">List all pizza orders</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-orders">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-orders" data-method="GET"
      data-path="api/v1/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-orders"
                    onclick="tryItOut('GETapi-v1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-orders"
                    onclick="cancelTryOut('GETapi-v1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="orders-POSTapi-v1-orders">Create a new order</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:30000/api/v1/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"attributes\": {
            \"customer_id\": \"CUSTOMER_001\",
            \"pizzas\": [
                \"architecto\"
            ]
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "attributes": {
            "customer_id": "CUSTOMER_001",
            "pizzas": [
                "architecto"
            ]
        }
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-orders">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;ORDER_001&quot;,
        &quot;customer&quot;: {
            &quot;id&quot;: &quot;CUSTOMER_001&quot;,
            &quot;name&quot;: &quot;John Doe&quot;,
            &quot;email&quot;: &quot;john@example.com&quot;
        },
        &quot;order_items&quot;: [
            {
                &quot;pizza_id&quot;: &quot;PIZZA_001&quot;,
                &quot;name&quot;: &quot;Pepperoni&quot;,
                &quot;quantity&quot;: 2,
                &quot;subtotal&quot;: 700,
                &quot;toppings&quot;: [
                    {
                        &quot;id&quot;: &quot;TOPPING_AQDWJ7CHRS&quot;,
                        &quot;name&quot;: &quot;Cheese&quot;,
                        &quot;quantity&quot;: 1,
                        &quot;subtotal&quot;: 50
                    }
                ]
            }
        ],
        &quot;payment&quot;: {
            &quot;method&quot;: &quot;Credit Card&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;transaction_id&quot;: null
        },
        &quot;status&quot;: &quot;pending&quot;,
        &quot;total_amount&quot;: 750,
        &quot;created_at&quot;: 1761895592,
        &quot;updated_at&quot;: 1761895592
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-orders" data-method="POST"
      data-path="api/v1/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-orders"
                    onclick="tryItOut('POSTapi-v1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-orders"
                    onclick="cancelTryOut('POSTapi-v1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The main payload object</p>
            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Attributes of the order</p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>customer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.customer_id"                data-endpoint="POSTapi-v1-orders"
               value="CUSTOMER_001"
               data-component="body">
    <br>
<p>The ID of the customer. Example: <code>CUSTOMER_001</code></p>
                    </div>
                                                                <div style=" margin-left: 28px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>pizzas</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Array of pizzas</p>
            </summary>
                                                <div style=" margin-left: 42px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>*</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 56px; clear: unset;">
                        <b style="line-height: 2;"><code>pizza_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.pizzas.*.pizza_id"                data-endpoint="POSTapi-v1-orders"
               value="PIZZA_001"
               data-component="body">
    <br>
<p>The ID of the pizza. Example: <code>PIZZA_001</code></p>
                    </div>
                                                                <div style="margin-left: 56px; clear: unset;">
                        <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.attributes.pizzas.*.quantity"                data-endpoint="POSTapi-v1-orders"
               value="2"
               data-component="body">
    <br>
<p>Quantity of this pizza. Example: <code>2</code></p>
                    </div>
                                                                <div style="margin-left: 56px; clear: unset;">
                        <b style="line-height: 2;"><code>subtotal</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.attributes.pizzas.*.subtotal"                data-endpoint="POSTapi-v1-orders"
               value="700"
               data-component="body">
    <br>
<p>Subtotal for this pizza. Example: <code>700</code></p>
                    </div>
                                                                <div style=" margin-left: 56px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>toppings</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Optional array of toppings (max 4)</p>
            </summary>
                                                <div style=" margin-left: 70px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>*</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 84px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.pizzas.*.toppings.*.id"                data-endpoint="POSTapi-v1-orders"
               value="TOPPING_AQDWJ7CHRS"
               data-component="body">
    <br>
<p>Topping ID. Example: <code>TOPPING_AQDWJ7CHRS</code></p>
                    </div>
                                                                <div style="margin-left: 84px; clear: unset;">
                        <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.attributes.pizzas.*.toppings.*.quantity"                data-endpoint="POSTapi-v1-orders"
               value="1"
               data-component="body">
    <br>
<p>Quantity for this topping (max 1). Example: <code>1</code></p>
                    </div>
                                                                <div style="margin-left: 84px; clear: unset;">
                        <b style="line-height: 2;"><code>subtotal</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.attributes.pizzas.*.toppings.*.subtotal"                data-endpoint="POSTapi-v1-orders"
               value="50"
               data-component="body">
    <br>
<p>Subtotal for this topping. Example: <code>50</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
                                        </details>
        </div>
                                        </details>
        </div>
                                        </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="orders-GETapi-v1-orders--id-">Get a single order</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-orders--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;customer&quot;: {
            &quot;id&quot;: &quot;CUSTOMER_001&quot;,
            &quot;name&quot;: &quot;John Doe&quot;,
            &quot;email&quot;: &quot;john@example.com&quot;
        },
        &quot;order_items&quot;: [
            {
                &quot;pizza_id&quot;: &quot;PIZZA_001&quot;,
                &quot;name&quot;: &quot;Pepperoni&quot;,
                &quot;quantity&quot;: 2,
                &quot;subtotal&quot;: 700,
                &quot;toppings&quot;: [
                    {
                        &quot;id&quot;: &quot;TOPPING_AQDWJ7CHRS&quot;,
                        &quot;name&quot;: &quot;Cheese&quot;,
                        &quot;quantity&quot;: 1,
                        &quot;subtotal&quot;: 50
                    }
                ]
            }
        ],
        &quot;payment&quot;: {
            &quot;method&quot;: &quot;Credit Card&quot;,
            &quot;status&quot;: &quot;paid&quot;,
            &quot;transaction_id&quot;: &quot;TX123456789&quot;
        },
        &quot;status&quot;: &quot;pending&quot;,
        &quot;total_amount&quot;: 10,
        &quot;created_at&quot;: 1761895592,
        &quot;updated_at&quot;: 1761895592
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-orders--id-" data-method="GET"
      data-path="api/v1/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-orders--id-"
                    onclick="tryItOut('GETapi-v1-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-orders--id-"
                    onclick="cancelTryOut('GETapi-v1-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="payments">Payments</h1>

    

                                <h2 id="payments-POSTapi-v1-payments">Store a new payment record</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-payments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:30000/api/v1/payments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"order_id\": \"architecto\",
    \"address\": \"n\",
    \"city\": \"g\",
    \"state\": \"z\",
    \"postal_code\": \"miyvdljnikhwaykc\",
    \"country\": \"m\",
    \"email\": \"marquardt.noah@example.com\",
    \"name\": \"l\",
    \"phone\": \"vqwrsitcpscqldzs\",
    \"amount\": 2,
    \"method\": \"r\",
    \"data\": {
        \"attributes\": {
            \"order_id\": \"ORDER_001\",
            \"address\": \"123 Main St\",
            \"city\": \"Manila\",
            \"state\": \"Metro Manila\",
            \"postal_code\": \"1000\",
            \"country\": \"Philippines\",
            \"email\": \"john@example.com\",
            \"name\": \"John Doe\",
            \"phone\": \"+639171234567\",
            \"amount\": 750,
            \"method\": \"Credit Card\"
        }
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/payments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order_id": "architecto",
    "address": "n",
    "city": "g",
    "state": "z",
    "postal_code": "miyvdljnikhwaykc",
    "country": "m",
    "email": "marquardt.noah@example.com",
    "name": "l",
    "phone": "vqwrsitcpscqldzs",
    "amount": 2,
    "method": "r",
    "data": {
        "attributes": {
            "order_id": "ORDER_001",
            "address": "123 Main St",
            "city": "Manila",
            "state": "Metro Manila",
            "postal_code": "1000",
            "country": "Philippines",
            "email": "john@example.com",
            "name": "John Doe",
            "phone": "+639171234567",
            "amount": 750,
            "method": "Credit Card"
        }
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-payments">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;PAYMENT_ABC123&quot;,
        &quot;order_id&quot;: &quot;ORDER_001&quot;,
        &quot;address&quot;: &quot;123 Main St&quot;,
        &quot;city&quot;: &quot;Manila&quot;,
        &quot;state&quot;: &quot;Metro Manila&quot;,
        &quot;postal_code&quot;: &quot;1000&quot;,
        &quot;country&quot;: &quot;Philippines&quot;,
        &quot;email&quot;: &quot;john@example.com&quot;,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;phone&quot;: &quot;+639171234567&quot;,
        &quot;amount&quot;: 750,
        &quot;method&quot;: &quot;Credit Card&quot;,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;created_at&quot;: 1761895592
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-payments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-payments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-payments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-payments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-payments" data-method="POST"
      data-path="api/v1/payments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-payments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-payments"
                    onclick="tryItOut('POSTapi-v1-payments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-payments"
                    onclick="cancelTryOut('POSTapi-v1-payments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-payments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/payments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_id"                data-endpoint="POSTapi-v1-payments"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the orders table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-v1-payments"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTapi-v1-payments"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state"                data-endpoint="POSTapi-v1-payments"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="postal_code"                data-endpoint="POSTapi-v1-payments"
               value="miyvdljnikhwaykc"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>miyvdljnikhwaykc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="POSTapi-v1-payments"
               value="m"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>m</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-payments"
               value="marquardt.noah@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 150 characters. Example: <code>marquardt.noah@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-payments"
               value="l"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>l</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-payments"
               value="vqwrsitcpscqldzs"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>vqwrsitcpscqldzs</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="amount"                data-endpoint="POSTapi-v1-payments"
               value="2"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>method</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="method"                data-endpoint="POSTapi-v1-payments"
               value="r"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>r</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The main payload object</p>
            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Payment attributes</p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.order_id"                data-endpoint="POSTapi-v1-payments"
               value="ORDER_001"
               data-component="body">
    <br>
<p>The ID of the order. Example: <code>ORDER_001</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.address"                data-endpoint="POSTapi-v1-payments"
               value="123 Main St"
               data-component="body">
    <br>
<p>Billing address. Example: <code>123 Main St</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.city"                data-endpoint="POSTapi-v1-payments"
               value="Manila"
               data-component="body">
    <br>
<p>City. Example: <code>Manila</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.state"                data-endpoint="POSTapi-v1-payments"
               value="Metro Manila"
               data-component="body">
    <br>
<p>State/Province. Example: <code>Metro Manila</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.postal_code"                data-endpoint="POSTapi-v1-payments"
               value="1000"
               data-component="body">
    <br>
<p>Postal code. Example: <code>1000</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.country"                data-endpoint="POSTapi-v1-payments"
               value="Philippines"
               data-component="body">
    <br>
<p>Country. Example: <code>Philippines</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.email"                data-endpoint="POSTapi-v1-payments"
               value="john@example.com"
               data-component="body">
    <br>
<p>Customer email. Example: <code>john@example.com</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.name"                data-endpoint="POSTapi-v1-payments"
               value="John Doe"
               data-component="body">
    <br>
<p>Customer name. Example: <code>John Doe</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.phone"                data-endpoint="POSTapi-v1-payments"
               value="+639171234567"
               data-component="body">
    <br>
<p>Customer phone. Example: <code>+639171234567</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.attributes.amount"                data-endpoint="POSTapi-v1-payments"
               value="750"
               data-component="body">
    <br>
<p>Payment amount. Example: <code>750</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>method</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.method"                data-endpoint="POSTapi-v1-payments"
               value="Credit Card"
               data-component="body">
    <br>
<p>Payment method. Example: <code>Credit Card</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="payments-POSTapi-v1-payments--payment_id--pay">Mark a payment as successful</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-payments--payment_id--pay">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:30000/api/v1/payments/PAYMENT_ABC123/pay" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/payments/PAYMENT_ABC123/pay"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-payments--payment_id--pay">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;PAYMENT_ABC123&quot;,
        &quot;status&quot;: &quot;paid&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-payments--payment_id--pay" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-payments--payment_id--pay"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-payments--payment_id--pay"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-payments--payment_id--pay" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-payments--payment_id--pay">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-payments--payment_id--pay" data-method="POST"
      data-path="api/v1/payments/{payment_id}/pay"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-payments--payment_id--pay', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-payments--payment_id--pay"
                    onclick="tryItOut('POSTapi-v1-payments--payment_id--pay');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-payments--payment_id--pay"
                    onclick="cancelTryOut('POSTapi-v1-payments--payment_id--pay');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-payments--payment_id--pay"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/payments/{payment_id}/pay</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-payments--payment_id--pay"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-payments--payment_id--pay"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>payment_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_id"                data-endpoint="POSTapi-v1-payments--payment_id--pay"
               value="PAYMENT_ABC123"
               data-component="url">
    <br>
<p>The ID of the payment. Example: <code>PAYMENT_ABC123</code></p>
            </div>
                    </form>

                    <h2 id="payments-POSTapi-v1-payments--payment_id--fail">Mark a payment as failed</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-payments--payment_id--fail">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:30000/api/v1/payments/PAYMENT_ABC123/fail" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/payments/PAYMENT_ABC123/fail"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-payments--payment_id--fail">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;PAYMENT_ABC123&quot;,
        &quot;status&quot;: &quot;failed&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-payments--payment_id--fail" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-payments--payment_id--fail"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-payments--payment_id--fail"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-payments--payment_id--fail" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-payments--payment_id--fail">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-payments--payment_id--fail" data-method="POST"
      data-path="api/v1/payments/{payment_id}/fail"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-payments--payment_id--fail', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-payments--payment_id--fail"
                    onclick="tryItOut('POSTapi-v1-payments--payment_id--fail');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-payments--payment_id--fail"
                    onclick="cancelTryOut('POSTapi-v1-payments--payment_id--fail');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-payments--payment_id--fail"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/payments/{payment_id}/fail</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-payments--payment_id--fail"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-payments--payment_id--fail"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>payment_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_id"                data-endpoint="POSTapi-v1-payments--payment_id--fail"
               value="PAYMENT_ABC123"
               data-component="url">
    <br>
<p>The ID of the payment. Example: <code>PAYMENT_ABC123</code></p>
            </div>
                    </form>

                <h1 id="pizza">Pizza</h1>

    

                                <h2 id="pizza-GETapi-v1-pizzas">List all pizzas</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-pizzas">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/pizzas" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/pizzas"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-pizzas">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;PIZZA_0BQVJAMDIU&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761911725,
            &quot;updated_at&quot;: 1761911725
        },
        {
            &quot;id&quot;: &quot;PIZZA_BCFZYARCK6&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913643,
            &quot;updated_at&quot;: 1761913643
        },
        {
            &quot;id&quot;: &quot;PIZZA_CE53MRUYKT&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913286,
            &quot;updated_at&quot;: 1761913286
        },
        {
            &quot;id&quot;: &quot;PIZZA_DQYFQFYLVJ&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761914204,
            &quot;updated_at&quot;: 1761914204
        },
        {
            &quot;id&quot;: &quot;PIZZA_FGSQPFXZBV&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913597,
            &quot;updated_at&quot;: 1761913597
        },
        {
            &quot;id&quot;: &quot;PIZZA_FPXCKP20K0&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761911444,
            &quot;updated_at&quot;: 1761911444
        },
        {
            &quot;id&quot;: &quot;PIZZA_JYAG13TPQP&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913896,
            &quot;updated_at&quot;: 1761913896
        },
        {
            &quot;id&quot;: &quot;PIZZA_LUHRIDBQ7B&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913841,
            &quot;updated_at&quot;: 1761913841
        },
        {
            &quot;id&quot;: &quot;PIZZA_NGIVBLJ9ZY&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913895,
            &quot;updated_at&quot;: 1761913895
        },
        {
            &quot;id&quot;: &quot;PIZZA_OFXHFNM2A2&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761911636,
            &quot;updated_at&quot;: 1761911636
        },
        {
            &quot;id&quot;: &quot;PIZZA_OREZW1ZOAA&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761914271,
            &quot;updated_at&quot;: 1761914271
        },
        {
            &quot;id&quot;: &quot;PIZZA_PN4IM8NYSE&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761914259,
            &quot;updated_at&quot;: 1761914259
        },
        {
            &quot;id&quot;: &quot;PIZZA_RXAOQCXGFA&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913093,
            &quot;updated_at&quot;: 1761913093
        },
        {
            &quot;id&quot;: &quot;PIZZA_S6TJ8D0IMY&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761914254,
            &quot;updated_at&quot;: 1761914254
        },
        {
            &quot;id&quot;: &quot;PIZZA_TRXKAOZTQZ&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913890,
            &quot;updated_at&quot;: 1761913890
        },
        {
            &quot;id&quot;: &quot;PIZZA_TXYBLGXFMS&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761913175,
            &quot;updated_at&quot;: 1761913175
        },
        {
            &quot;id&quot;: &quot;PIZZA_XKUB8TY3MH&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761914276,
            &quot;updated_at&quot;: 1761914276
        },
        {
            &quot;id&quot;: &quot;PIZZA_ZCEOJCR6EQ&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 1,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761911666,
            &quot;updated_at&quot;: 1761911666
        },
        {
            &quot;id&quot;: &quot;PIZZA_ZKJOZBTV4P&quot;,
            &quot;image&quot;: null,
            &quot;name&quot;: &quot;Spinach Pizza&quot;,
            &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
            &quot;customizable&quot;: 0,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;created_at&quot;: 1761914423,
            &quot;updated_at&quot;: 1761914423
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-pizzas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-pizzas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-pizzas"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-pizzas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-pizzas">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-pizzas" data-method="GET"
      data-path="api/v1/pizzas"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-pizzas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-pizzas"
                    onclick="tryItOut('GETapi-v1-pizzas');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-pizzas"
                    onclick="cancelTryOut('GETapi-v1-pizzas');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-pizzas"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/pizzas</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-pizzas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-pizzas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="pizza-POSTapi-v1-pizzas">Create a new pizza with optional toppings.</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-pizzas">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:30000/api/v1/pizzas" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/pizzas"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-pizzas">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Pepperoni Pizza&quot;,
        &quot;description&quot;: &quot;Delicious pepperoni pizza&quot;,
        &quot;customizable&quot;: true,
        &quot;price&quot;: 10.5,
        &quot;toppings&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Extra Cheese&quot;,
                &quot;price&quot;: 1.5
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Mushroom&quot;,
                &quot;price&quot;: 1
            }
        ],
        &quot;created_at&quot;: 1761895592,
        &quot;updated_at&quot;: 1761895592
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-pizzas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-pizzas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-pizzas"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-pizzas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-pizzas">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-pizzas" data-method="POST"
      data-path="api/v1/pizzas"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-pizzas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-pizzas"
                    onclick="tryItOut('POSTapi-v1-pizzas');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-pizzas"
                    onclick="cancelTryOut('POSTapi-v1-pizzas');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-pizzas"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/pizzas</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-pizzas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-pizzas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>attributes[name]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes[name]"                data-endpoint="POSTapi-v1-pizzas"
               value="Pepperoni Pizza"
               data-component="body">
    <br>
<p>The pizza name. Example: <code>Pepperoni Pizza</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>attributes[description]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes[description]"                data-endpoint="POSTapi-v1-pizzas"
               value="Delicious pepperoni pizza"
               data-component="body">
    <br>
<p>The pizza description. Example: <code>Delicious pepperoni pizza</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>attributes[customizable]</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-pizzas" style="display: none">
            <input type="radio" name="data.attributes[customizable]"
                   value="true"
                   data-endpoint="POSTapi-v1-pizzas"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-pizzas" style="display: none">
            <input type="radio" name="data.attributes[customizable]"
                   value="false"
                   data-endpoint="POSTapi-v1-pizzas"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Is pizza customizable. Example: <code>true</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>attributes[price]</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.attributes[price]"                data-endpoint="POSTapi-v1-pizzas"
               value="10.5"
               data-component="body">
    <br>
<p>Pizza price. Example: <code>10.5</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>attributes[toppings]</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes[toppings][0]"                data-endpoint="POSTapi-v1-pizzas"
               data-component="body">
        <input type="text" style="display: none"
               name="data.attributes[toppings][1]"                data-endpoint="POSTapi-v1-pizzas"
               data-component="body">
    <br>
<p>Array of topping IDs.</p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="pizza-GETapi-v1-pizzas--id-">Show a single pizza</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-pizzas--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/pizzas/PIZZA_0BQVJAMDIU" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/pizzas/PIZZA_0BQVJAMDIU"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-pizzas--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;PIZZA_0BQVJAMDIU&quot;,
        &quot;image&quot;: null,
        &quot;name&quot;: &quot;Spinach Pizza&quot;,
        &quot;description&quot;: &quot;Delicious Spinach pizza&quot;,
        &quot;customizable&quot;: 1,
        &quot;price&quot;: &quot;10.00&quot;,
        &quot;created_at&quot;: 1761911725,
        &quot;updated_at&quot;: 1761911725
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-pizzas--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-pizzas--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-pizzas--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-pizzas--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-pizzas--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-pizzas--id-" data-method="GET"
      data-path="api/v1/pizzas/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-pizzas--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-pizzas--id-"
                    onclick="tryItOut('GETapi-v1-pizzas--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-pizzas--id-"
                    onclick="cancelTryOut('GETapi-v1-pizzas--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-pizzas--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/pizzas/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-pizzas--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-pizzas--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-pizzas--id-"
               value="PIZZA_0BQVJAMDIU"
               data-component="url">
    <br>
<p>The ID of the pizza. Example: <code>PIZZA_0BQVJAMDIU</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pizza</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="pizza"                data-endpoint="GETapi-v1-pizzas--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the pizza. Example: <code>16</code></p>
            </div>
                    </form>

                <h1 id="topping">Topping</h1>

    

                                <h2 id="topping-GETapi-v1-toppings">List all Topping</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-toppings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/toppings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/toppings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-toppings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;TOPPING_AQDWJ7CHRS&quot;,
            &quot;name&quot;: &quot;Spinach6&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;created_at&quot;: 1761911439,
            &quot;updated_at&quot;: 1761911439
        },
        {
            &quot;id&quot;: &quot;TOPPING_EWYQOQD4R7&quot;,
            &quot;name&quot;: &quot;Spinach2&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;created_at&quot;: 1761911278,
            &quot;updated_at&quot;: 1761911278
        },
        {
            &quot;id&quot;: &quot;TOPPING_LIZKHEFUF8&quot;,
            &quot;name&quot;: &quot;Spinach1&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;created_at&quot;: 1761911154,
            &quot;updated_at&quot;: 1761911154
        },
        {
            &quot;id&quot;: &quot;TOPPING_NJ8VBTAXVL&quot;,
            &quot;name&quot;: &quot;Spinach&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;created_at&quot;: 1761911088,
            &quot;updated_at&quot;: 1761911088
        },
        {
            &quot;id&quot;: &quot;TOPPING_Q1GGBBPLXO&quot;,
            &quot;name&quot;: &quot;Spinach5&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;created_at&quot;: 1761911422,
            &quot;updated_at&quot;: 1761911422
        },
        {
            &quot;id&quot;: &quot;TOPPING_XKXAXXJBHV&quot;,
            &quot;name&quot;: &quot;Spinach4&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;created_at&quot;: 1761911315,
            &quot;updated_at&quot;: 1761911315
        },
        {
            &quot;id&quot;: &quot;TOPPING_ZVJ6SC3NMJ&quot;,
            &quot;name&quot;: &quot;Spinach3&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;created_at&quot;: 1761911296,
            &quot;updated_at&quot;: 1761911296
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-toppings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-toppings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-toppings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-toppings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-toppings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-toppings" data-method="GET"
      data-path="api/v1/toppings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-toppings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-toppings"
                    onclick="tryItOut('GETapi-v1-toppings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-toppings"
                    onclick="cancelTryOut('GETapi-v1-toppings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-toppings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/toppings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-toppings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-toppings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="topping-POSTapi-v1-toppings">Create a new topping.</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-toppings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:30000/api/v1/toppings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/toppings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-toppings">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Extra Cheese&quot;,
        &quot;price&quot;: 1.5,
        &quot;created_at&quot;: 1761895592,
        &quot;updated_at&quot;: 1761895592
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-toppings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-toppings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-toppings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-toppings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-toppings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-toppings" data-method="POST"
      data-path="api/v1/toppings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-toppings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-toppings"
                    onclick="tryItOut('POSTapi-v1-toppings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-toppings"
                    onclick="cancelTryOut('POSTapi-v1-toppings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-toppings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/toppings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-toppings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-toppings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.type"                data-endpoint="POSTapi-v1-toppings"
               value="toppings"
               data-component="body">
    <br>
<p>Resource type. Example: <code>toppings</code></p>
                    </div>
                                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>attributes</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data.attributes.name"                data-endpoint="POSTapi-v1-toppings"
               value="Extra Cheese"
               data-component="body">
    <br>
<p>Topping name. Example: <code>Extra Cheese</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.attributes.price"                data-endpoint="POSTapi-v1-toppings"
               value="1.5"
               data-component="body">
    <br>
<p>Topping price. Example: <code>1.5</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="topping-GETapi-v1-toppings--id-">Show a single topping</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-toppings--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:30000/api/v1/toppings/TOPPING_AQDWJ7CHRS" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:30000/api/v1/toppings/TOPPING_AQDWJ7CHRS"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-toppings--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;TOPPING_AQDWJ7CHRS&quot;,
        &quot;name&quot;: &quot;Spinach6&quot;,
        &quot;price&quot;: &quot;1.00&quot;,
        &quot;created_at&quot;: 1761911439,
        &quot;updated_at&quot;: 1761911439
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-toppings--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-toppings--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-toppings--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-toppings--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-toppings--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-toppings--id-" data-method="GET"
      data-path="api/v1/toppings/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-toppings--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-toppings--id-"
                    onclick="tryItOut('GETapi-v1-toppings--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-toppings--id-"
                    onclick="cancelTryOut('GETapi-v1-toppings--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-toppings--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/toppings/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-toppings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-toppings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-toppings--id-"
               value="TOPPING_AQDWJ7CHRS"
               data-component="url">
    <br>
<p>The ID of the topping. Example: <code>TOPPING_AQDWJ7CHRS</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>topping</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="topping"                data-endpoint="GETapi-v1-toppings--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the topping. Example: <code>16</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
