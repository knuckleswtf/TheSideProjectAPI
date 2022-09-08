<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>The SideProject API</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe-alternate/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe-alternate/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe-alternate/js/tryitout-4.x-dev.js") }}"></script>

    <script src="{{ asset("/vendor/scribe-alternate/js/theme-default-4.x-dev.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe-alternate/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
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
                    <ul id="tocify-header-dummy-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="dummy-endpoints">
                    <a href="#dummy-endpoints">Dummy endpoints</a>
                </li>
                                    <ul id="tocify-subheader-dummy-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="dummy-endpoints-a-subgroup">
                                <a href="#dummy-endpoints-a-subgroup">A subgroup</a>
                            </li>
                                                            <ul id="tocify-subheader-dummy-endpoints-a-subgroup" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="-POSTapi-nested">
                                            <a href="#-POSTapi-nested">Nested fields</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="-POSTapi-array-body">
                                            <a href="#-POSTapi-array-body">Body content array</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="dummy-endpoints-another-subgroup">
                                <a href="#dummy-endpoints-another-subgroup">Another subgroup</a>
                            </li>
                                                            <ul id="tocify-subheader-dummy-endpoints-another-subgroup" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="-POSTapi-file-input">
                                            <a href="#-POSTapi-file-input">File input</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="-GETapi-v1-languages">
                                            <a href="#-GETapi-v1-languages">GET api/v1/languages</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-general" class="tocify-header">
                <li class="tocify-item level-1" data-unique="general">
                    <a href="#general">General</a>
                </li>
                                    <ul id="tocify-subheader-general" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="-GETapi-healthcheck--unnecessaryParam--">
                                <a href="#-GETapi-healthcheck--unnecessaryParam--">Healthcheck</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-GETapi-me">
                                <a href="#-GETapi-me">GET api/me</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-side-projects" class="tocify-header">
                <li class="tocify-item level-1" data-unique="side-projects">
                    <a href="#side-projects">Side Projects</a>
                </li>
                                    <ul id="tocify-subheader-side-projects" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="-GETapi-side_projects">
                                <a href="#-GETapi-side_projects">View all side projects</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-POSTapi-side_projects">
                                <a href="#-POSTapi-side_projects">Start a new side project</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-GETapi-side_projects--id-">
                                <a href="#-GETapi-side_projects--id-">View a side project</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-PUTapi-side_projects--id-">
                                <a href="#-PUTapi-side_projects--id-">Update a side project</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-DELETEapi-side_projects--id-">
                                <a href="#-DELETEapi-side_projects--id-">Delete a side project</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-users" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users">
                    <a href="#users">Users</a>
                </li>
                                    <ul id="tocify-subheader-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="-POSTapi-users">
                                <a href="#-POSTapi-users">Create a user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-GETapi-users--id-">
                                <a href="#-GETapi-users--id-">Fetch a user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-GETapi-users">
                                <a href="#-GETapi-users">View all users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="-POSTapi-users--id--auth">
                                <a href="#-POSTapi-users--id--auth">Authenticate</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe-alternate.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe-alternate.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: September 7 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Start (and never finish) side projects with this API.</p>
<p>This is an alternate API doc, testing out Scribe's multi-docs' support.</p>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://testapi.com</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {BEARER_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by using the <code>users/auth</code> endpoint.</p>

        <h1 id="dummy-endpoints">Dummy endpoints</h1>

    

                        <h2 id="dummy-endpoints-a-subgroup">A subgroup</h2>
                                                    <h2 id="-POSTapi-nested">Nested fields</h2>

<p>
</p>



<span id="example-requests-POSTapi-nested">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://testapi.com/api/nested?random=et" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"data\": {
        \"name\": \"et\",
        \"size\": 5,
        \"things\": [
            \"et\"
        ],
        \"objects\": [
            {
                \"a\": \"et\",
                \"b\": \"et\"
            }
        ]
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/nested"
);

const params = {
    "random": "et",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": {
        "name": "et",
        "size": 5,
        "things": [
            "et"
        ],
        "objects": [
            {
                "a": "et",
                "b": "et"
            }
        ]
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://testapi.com/api/nested',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'random'=&gt; 'et',
        ],
        'json' =&gt; [
            'data' =&gt; [
                'name' =&gt; 'et',
                'size' =&gt; 5,
                'things' =&gt; [
                    'et',
                ],
                'objects' =&gt; [
                    [
                        'a' =&gt; 'et',
                        'b' =&gt; 'et',
                    ],
                ],
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-nested">
</span>
<span id="execution-results-POSTapi-nested" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-nested"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nested"></code></pre>
</span>
<span id="execution-error-POSTapi-nested" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nested"></code></pre>
</span>
<form id="form-POSTapi-nested" data-method="POST"
      data-path="api/nested"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-nested', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-nested"
                    onclick="tryItOut('POSTapi-nested');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-nested"
                    onclick="cancelTryOut('POSTapi-nested');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-nested" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/nested</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>random</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="random"
               data-endpoint="POSTapi-nested"
               value="et"
               data-component="query" hidden>
    <br>
<p>A random query parameter.</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
<br>
<p>The data</p>
            </summary>
                                                <p>
                        <b><code>data.name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="data.name"
               data-endpoint="POSTapi-nested"
               value="et"
               data-component="body" hidden>
    <br>
<p>A string field.</p>
                    </p>
                                                                <p>
                        <b><code>data.size</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number"
               name="data.size"
               data-endpoint="POSTapi-nested"
               value="5"
               data-component="body" hidden>
    <br>
<p>A number.</p>
                    </p>
                                                                <p>
                        <b><code>data.other</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="data.other"
               data-endpoint="POSTapi-nested"
               value=""
               data-component="body" hidden>
    <br>
<p>Optional thing.</p>
                    </p>
                                                                <p>
                        <b><code>data.things</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="data.things[0]"
               data-endpoint="POSTapi-nested"
               data-component="body" hidden>
        <input type="text"
               name="data.things[1]"
               data-endpoint="POSTapi-nested"
               data-component="body" hidden>
    <br>
<p>An array of strings.</p>
                    </p>
                                                                <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>data.objects</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>An array of objects</p>
            </summary>
                                                <p>
                        <b><code>data.objects[].a</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="data.objects.0.a"
               data-endpoint="POSTapi-nested"
               value="et"
               data-component="body" hidden>
    <br>
<p>A field in the array of objects</p>
                    </p>
                                                                <p>
                        <b><code>data.objects[].b</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="data.objects.0.b"
               data-endpoint="POSTapi-nested"
               value="et"
               data-component="body" hidden>
    <br>
<p>A field in the array of objects</p>
                    </p>
                                    </details>
        </p>
                                        </details>
        </p>
        </form>

                    <h2 id="-POSTapi-array-body">Body content array</h2>

<p>
</p>



<span id="example-requests-POSTapi-array-body">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://testapi.com/api/array-body" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "[
    {
        \"row_id\": \"700\",
        \"name\": \"My item name\"
    }
]"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/array-body"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = [
    {
        "row_id": "700",
        "name": "My item name"
    }
];

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://testapi.com/api/array-body',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            [
                'row_id' =&gt; '700',
                'name' =&gt; 'My item name',
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-array-body">
</span>
<span id="execution-results-POSTapi-array-body" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-array-body"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-array-body"></code></pre>
</span>
<span id="execution-error-POSTapi-array-body" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-array-body"></code></pre>
</span>
<form id="form-POSTapi-array-body" data-method="POST"
      data-path="api/array-body"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="1"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-array-body', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-array-body"
                    onclick="tryItOut('POSTapi-array-body');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-array-body"
                    onclick="cancelTryOut('POSTapi-array-body');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-array-body" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/array-body</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <p>The request body is an array (<code>object[]</code>`), representing list of items.</p>
        </p>
                                            <p>
                        <b><code>[].row_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="0.row_id"
               data-endpoint="POSTapi-array-body"
               value="700"
               data-component="body" hidden>
    <br>
<p>A unique ID.</p>
                    </p>
                                                                <p>
                        <b><code>[].name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="0.name"
               data-endpoint="POSTapi-array-body"
               value="My item name"
               data-component="body" hidden>
    <br>
<p>An element name.</p>
                    </p>
                                    </form>

                                <h2 id="dummy-endpoints-another-subgroup">Another subgroup</h2>
                                        <p>
                    <p>This time, with a description!</p>
                </p>
                                        <h2 id="-POSTapi-file-input">File input</h2>

<p>
</p>



<span id="example-requests-POSTapi-file-input">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://testapi.com/api/file-input" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "nested[_string]=et" \
    --form "the_file=@C:\Users\shalvah\AppData\Local\Temp\phpB70D.tmp" \
    --form "nested[_file]=@C:\Users\shalvah\AppData\Local\Temp\phpB70E.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/file-input"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('nested[_string]', 'et');
body.append('the_file', document.querySelector('input[name="the_file"]').files[0]);
body.append('nested[_file]', document.querySelector('input[name="nested[_file]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://testapi.com/api/file-input',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nested[_string]',
                'contents' =&gt; 'et'
            ],
            [
                'name' =&gt; 'the_file',
                'contents' =&gt; fopen('C:\Users\shalvah\AppData\Local\Temp\phpB70D.tmp', 'r')
            ],
            [
                'name' =&gt; 'nested[_file]',
                'contents' =&gt; fopen('C:\Users\shalvah\AppData\Local\Temp\phpB70E.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-file-input">
</span>
<span id="execution-results-POSTapi-file-input" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-file-input"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-file-input"></code></pre>
</span>
<span id="execution-error-POSTapi-file-input" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-file-input"></code></pre>
</span>
<form id="form-POSTapi-file-input" data-method="POST"
      data-path="api/file-input"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-file-input', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-file-input"
                    onclick="tryItOut('POSTapi-file-input');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-file-input"
                    onclick="cancelTryOut('POSTapi-file-input');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-file-input" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/file-input</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>the_file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file"
               name="the_file"
               data-endpoint="POSTapi-file-input"
               value=""
               data-component="body" hidden>
    <br>
<p>Just a file.</p>
        </p>
                <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>nested</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
<br>

            </summary>
                                                <p>
                        <b><code>nested._string</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="nested._string"
               data-endpoint="POSTapi-file-input"
               value="et"
               data-component="body" hidden>
    <br>
<p>A nested string.</p>
                    </p>
                                                                <p>
                        <b><code>nested._file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file"
               name="nested._file"
               data-endpoint="POSTapi-file-input"
               value=""
               data-component="body" hidden>
    <br>
<p>A nested file.</p>
                    </p>
                                    </details>
        </p>
        </form>

                    <h2 id="-GETapi-v1-languages">GET api/v1/languages</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-languages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://testapi.com/api/v1/languages" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Test: Value"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/v1/languages"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Test": "Value",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://testapi.com/api/v1/languages',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Test' =&gt; 'Value',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-languages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-languages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-languages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-languages"></code></pre>
</span>
<span id="execution-error-GETapi-v1-languages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-languages"></code></pre>
</span>
<form id="form-GETapi-v1-languages" data-method="GET"
      data-path="api/v1/languages"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Test":"Value"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-languages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-languages"
                    onclick="tryItOut('GETapi-v1-languages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-languages"
                    onclick="cancelTryOut('GETapi-v1-languages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-languages" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/languages</code></b>
        </p>
                    </form>

                <h1 id="general">General</h1>

    

                                <h2 id="-GETapi-healthcheck--unnecessaryParam--">Healthcheck</h2>

<p>
</p>

<p>Check that the service is up. If everything is okay, you'll get a 200 OK response.</p>
<p>Otherwise, the request will fail with a 400 error, and a response listing the failed services.</p>

<span id="example-requests-GETapi-healthcheck--unnecessaryParam--">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://testapi.com/api/healthcheck/et" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/healthcheck/et"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://testapi.com/api/healthcheck/et',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-healthcheck--unnecessaryParam--">
            <blockquote>
            <p>Example response (400, Service is unhealthy):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;down&quot;,
    &quot;services&quot;: {
        &quot;database&quot;: &quot;up&quot;,
        &quot;redis&quot;: &quot;down&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 55
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;up&quot;,
    &quot;services&quot;: {
        &quot;database&quot;: &quot;up&quot;,
        &quot;redis&quot;: &quot;up&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-healthcheck--unnecessaryParam--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-healthcheck--unnecessaryParam--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-healthcheck--unnecessaryParam--"></code></pre>
</span>
<span id="execution-error-GETapi-healthcheck--unnecessaryParam--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-healthcheck--unnecessaryParam--"></code></pre>
</span>
<form id="form-GETapi-healthcheck--unnecessaryParam--" data-method="GET"
      data-path="api/healthcheck/{unnecessaryParam?}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-healthcheck--unnecessaryParam--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-healthcheck--unnecessaryParam--"
                    onclick="tryItOut('GETapi-healthcheck--unnecessaryParam--');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-healthcheck--unnecessaryParam--"
                    onclick="cancelTryOut('GETapi-healthcheck--unnecessaryParam--');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-healthcheck--unnecessaryParam--" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/healthcheck/{unnecessaryParam?}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>unnecessaryParam</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="unnecessaryParam"
               data-endpoint="GETapi-healthcheck--unnecessaryParam--"
               value="et"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <p>
            <b><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
<br>
<p>The status of this API (<code>up</code> or <code>down</code>).</p>
        </p>
                <p>
            <b><code>services</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
<br>
<p>Map of each downstream service and their status (<code>up</code> or <code>down</code>).</p>
        </p>
                        <h2 id="-GETapi-me">GET api/me</h2>

<p>
</p>



<span id="example-requests-GETapi-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://testapi.com/api/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://testapi.com/api/me',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-me"></code></pre>
</span>
<span id="execution-error-GETapi-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-me"></code></pre>
</span>
<form id="form-GETapi-me" data-method="GET"
      data-path="api/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-me"
                    onclick="tryItOut('GETapi-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-me"
                    onclick="cancelTryOut('GETapi-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/me</code></b>
        </p>
                    </form>

                <h1 id="side-projects">Side Projects</h1>

    <p>APIs for managing side projects.</p>
<p>Note how the URL params for the endpoints here are automatically generated by Scribe.</p>

                                <h2 id="-GETapi-side_projects">View all side projects</h2>

<p>
</p>

<p>This endpoint's response was gotten via a &quot;response call&quot;—
Scribe called our API in a test environment to get a sample response.</p>

<span id="example-requests-GETapi-side_projects">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://testapi.com/api/side_projects" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/side_projects"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://testapi.com/api/side_projects',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-side_projects">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;voluptas assumenda maiores&quot;,
        &quot;description&quot;: &quot;Consequuntur aut ea est non.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20310222,
        &quot;created_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
        &quot;user_id&quot;: 2
    },
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;iusto ut dolor&quot;,
        &quot;description&quot;: &quot;Voluptatem aspernatur dolorem quae quaerat harum.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20301215,
        &quot;created_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
        &quot;user_id&quot;: 1
    },
    {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;provident et consequatur&quot;,
        &quot;description&quot;: &quot;Quos et ipsum cum pariatur ex perspiciatis eius.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20231022,
        &quot;created_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
        &quot;user_id&quot;: 3
    },
    {
        &quot;id&quot;: 4,
        &quot;name&quot;: &quot;corporis consequuntur amet&quot;,
        &quot;description&quot;: &quot;Dolores eveniet deleniti voluptatem saepe expedita.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20230712,
        &quot;created_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
        &quot;user_id&quot;: 1
    },
    {
        &quot;id&quot;: 5,
        &quot;name&quot;: &quot;optio excepturi ea&quot;,
        &quot;description&quot;: &quot;Error deleniti sint a nostrum consequuntur et.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20260324,
        &quot;created_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
        &quot;user_id&quot;: 4
    },
    {
        &quot;id&quot;: 6,
        &quot;name&quot;: &quot;nihil voluptate quaerat&quot;,
        &quot;description&quot;: &quot;Animi reprehenderit soluta id quo.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20290603,
        &quot;created_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
        &quot;user_id&quot;: 1
    },
    {
        &quot;id&quot;: 7,
        &quot;name&quot;: &quot;aspernatur architecto assumenda&quot;,
        &quot;description&quot;: &quot;Nisi ea aut vel sint vero voluptas tempore.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20280710,
        &quot;created_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
        &quot;user_id&quot;: 5
    },
    {
        &quot;id&quot;: 8,
        &quot;name&quot;: &quot;vel perspiciatis quo&quot;,
        &quot;description&quot;: &quot;Et qui praesentium consequatur distinctio natus.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20210605,
        &quot;created_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
        &quot;user_id&quot;: 1
    },
    {
        &quot;id&quot;: 9,
        &quot;name&quot;: &quot;qui et totam&quot;,
        &quot;description&quot;: &quot;Veritatis quo dolorum soluta ut.&quot;,
        &quot;url&quot;: null,
        &quot;due_at&quot;: 20270203,
        &quot;created_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
        &quot;user_id&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-side_projects" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-side_projects"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-side_projects"></code></pre>
</span>
<span id="execution-error-GETapi-side_projects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-side_projects"></code></pre>
</span>
<form id="form-GETapi-side_projects" data-method="GET"
      data-path="api/side_projects"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-side_projects', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-side_projects"
                    onclick="tryItOut('GETapi-side_projects');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-side_projects"
                    onclick="cancelTryOut('GETapi-side_projects');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-side_projects" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/side_projects</code></b>
        </p>
                    </form>

                    <h2 id="-POSTapi-side_projects">Start a new side project</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p><em>Even though we both know you'll never finish it.</em></p>
<p>This endpoint's body parameters were automatically generated by Scribe
from the controller's code. Check out the source! </aside></p>

<span id="example-requests-POSTapi-side_projects">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://testapi.com/api/side_projects" \
    --header "Authorization: Bearer {BEARER_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"The SideProject API\",
    \"description\": \"pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv\",
    \"url\": \"http:\\/\\/hartmann.com\\/magnam-tenetur-quia-nemo-sit-est-numquam\",
    \"due_at\": \"2084-02-25\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/side_projects"
);

const headers = {
    "Authorization": "Bearer {BEARER_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "The SideProject API",
    "description": "pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv",
    "url": "http:\/\/hartmann.com\/magnam-tenetur-quia-nemo-sit-est-numquam",
    "due_at": "2084-02-25"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://testapi.com/api/side_projects',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {BEARER_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'The SideProject API',
            'description' =&gt; 'pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv',
            'url' =&gt; 'http://hartmann.com/magnam-tenetur-quia-nemo-sit-est-numquam',
            'due_at' =&gt; '2084-02-25',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-side_projects">
</span>
<span id="execution-results-POSTapi-side_projects" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-side_projects"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-side_projects"></code></pre>
</span>
<span id="execution-error-POSTapi-side_projects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-side_projects"></code></pre>
</span>
<form id="form-POSTapi-side_projects" data-method="POST"
      data-path="api/side_projects"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {BEARER_TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-side_projects', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-side_projects"
                    onclick="tryItOut('POSTapi-side_projects');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-side_projects"
                    onclick="cancelTryOut('POSTapi-side_projects');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-side_projects" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/side_projects</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-side_projects" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-side_projects"
                       data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-side_projects"
               value="The SideProject API"
               data-component="body" hidden>
    <br>
<p>The name of your side project. Must not be greater than 80 characters.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-side_projects"
               value="pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv"
               data-component="body" hidden>
    <br>
<p>A longer description of your side project. Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="url"
               data-endpoint="POSTapi-side_projects"
               value="http://hartmann.com/magnam-tenetur-quia-nemo-sit-est-numquam"
               data-component="body" hidden>
    <br>
<p>A url to your side project. Must be a valid URL.</p>
        </p>
                <p>
            <b><code>due_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="due_at"
               data-endpoint="POSTapi-side_projects"
               value="2084-02-25"
               data-component="body" hidden>
    <br>
<p>Due date for the side project. Must be a valid date. Must be a valid date in the format <code>Ymd</code>. Must be a date after <code>today</code>.</p>
        </p>
        </form>

                    <h2 id="-GETapi-side_projects--id-">View a side project</h2>

<p>
</p>

<p>This endpoint's response uses a Fractal transformer, so we tell Scribe that using an annotation,
and it figures out how to generate a sample. The 404 sample is gotten from a &quot;response file&quot;.</p>
<aside class="success">Also, pretty cool: this endpoint's (and many others') URL parameters were figured out entirely by Scribe!</aside>

<span id="example-requests-GETapi-side_projects--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://testapi.com/api/side_projects/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/side_projects/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://testapi.com/api/side_projects/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-side_projects--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;name&quot;: &quot;suscipit qui cumque&quot;,
        &quot;description&quot;: &quot;Tenetur quia nemo sit est.&quot;,
        &quot;due_date&quot;: &quot;20241103&quot;,
        &quot;owner&quot;: {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Kurt Kub&quot;,
            &quot;email&quot;: &quot;juvenal97@example.org&quot;,
            &quot;email_verified_at&quot;: &quot;2022-09-07T23:30:38.000000Z&quot;,
            &quot;created_at&quot;: &quot;2022-09-07T23:30:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-09-07T23:30:38.000000Z&quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Side project not found):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Not found&quot;,
    &quot;resource&quot;: &quot;Side project&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-side_projects--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-side_projects--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-side_projects--id-"></code></pre>
</span>
<span id="execution-error-GETapi-side_projects--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-side_projects--id-"></code></pre>
</span>
<form id="form-GETapi-side_projects--id-" data-method="GET"
      data-path="api/side_projects/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-side_projects--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-side_projects--id-"
                    onclick="tryItOut('GETapi-side_projects--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-side_projects--id-"
                    onclick="cancelTryOut('GETapi-side_projects--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-side_projects--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/side_projects/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-side_projects--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the side project.</p>
            </p>
                    </form>

                    <h2 id="-PUTapi-side_projects--id-">Update a side project</h2>

<p>
</p>



<span id="example-requests-PUTapi-side_projects--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://testapi.com/api/side_projects/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/side_projects/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://testapi.com/api/side_projects/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-side_projects--id-">
</span>
<span id="execution-results-PUTapi-side_projects--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-side_projects--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-side_projects--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-side_projects--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-side_projects--id-"></code></pre>
</span>
<form id="form-PUTapi-side_projects--id-" data-method="PUT"
      data-path="api/side_projects/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-side_projects--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-side_projects--id-"
                    onclick="tryItOut('PUTapi-side_projects--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-side_projects--id-"
                    onclick="cancelTryOut('PUTapi-side_projects--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-side_projects--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/side_projects/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/side_projects/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-side_projects--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the side project.</p>
            </p>
                    </form>

                    <h2 id="-DELETEapi-side_projects--id-">Delete a side project</h2>

<p>
</p>



<span id="example-requests-DELETEapi-side_projects--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://testapi.com/api/side_projects/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/side_projects/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://testapi.com/api/side_projects/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-side_projects--id-">
            <blockquote>
            <p>Example response (204, Nothing to see here):</p>
        </blockquote>
                <pre>
<code>[Empty response]</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-side_projects--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-side_projects--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-side_projects--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-side_projects--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-side_projects--id-"></code></pre>
</span>
<form id="form-DELETEapi-side_projects--id-" data-method="DELETE"
      data-path="api/side_projects/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-side_projects--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-side_projects--id-"
                    onclick="tryItOut('DELETEapi-side_projects--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-side_projects--id-"
                    onclick="cancelTryOut('DELETEapi-side_projects--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-side_projects--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/side_projects/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-side_projects--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the side project.</p>
            </p>
                    </form>

                <h1 id="users">Users</h1>

    

                                <h2 id="-POSTapi-users">Create a user</h2>

<p>
</p>

<p>This endpoint's body parameters are automatically generated from a FormRequest.</p>

<span id="example-requests-POSTapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://testapi.com/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv\",
    \"email\": \"casimir70@example.com\",
    \"password\": \"et\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv",
    "email": "casimir70@example.com",
    "password": "et"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://testapi.com/api/users',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv',
            'email' =&gt; 'casimir70@example.com',
            'password' =&gt; 'et',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-users">
</span>
<span id="execution-results-POSTapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"></code></pre>
</span>
<span id="execution-error-POSTapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users"></code></pre>
</span>
<form id="form-POSTapi-users" data-method="POST"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users"
                    onclick="tryItOut('POSTapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users"
                    onclick="cancelTryOut('POSTapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-users"
               value="pidsgyfhasfdpmrgozmxiqtrcoqjruexeugqpersioudgkpsbnkltlaqvmwjyiahevihxmbowbowymkwgcqxiqmrchyclplgrcipefeeopzzxuuljqvytlucrlnslwwcdxrknhwrlmabpwubvoetriefhfwzv"
               data-component="body" hidden>
    <br>
<p>Must be at least 1 characters. Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-users"
               value="casimir70@example.com"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-users"
               value="et"
               data-component="body" hidden>
    <br>

        </p>
        </form>

                    <h2 id="-GETapi-users--id-">Fetch a user</h2>

<p>
</p>

<p>This endpoint's response uses an Eloquent API resource, so we tell Scribe that using an annotation,
and it figures out how to generate a sample. The 404 sample is gotten from a &quot;response file&quot;.</p>

<span id="example-requests-GETapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://testapi.com/api/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://testapi.com/api/users/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users--id-">
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Not found&quot;,
    &quot;resource&quot;: &quot;user&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 6,
        &quot;name&quot;: &quot;Mr. Merlin Friesen&quot;,
        &quot;email&quot;: &quot;hdoyle@example.com&quot;,
        &quot;side_projects&quot;: [
            {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;est numquam consequuntur&quot;,
                &quot;description&quot;: &quot;Atque nobis ut natus aut dolores eveniet.&quot;,
                &quot;url&quot;: null,
                &quot;due_at&quot;: 20251220,
                &quot;created_at&quot;: &quot;2022-09-07T23:30:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-09-07T23:30:38.000000Z&quot;,
                &quot;user_id&quot;: 6
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"></code></pre>
</span>
<span id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-"></code></pre>
</span>
<form id="form-GETapi-users--id-" data-method="GET"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--id-"
                    onclick="tryItOut('GETapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--id-"
                    onclick="cancelTryOut('GETapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-users--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

                    <h2 id="-GETapi-users">View all users</h2>

<p>
</p>

<p>This endpoint uses a custom Scribe strategy that parses a
<code>@usesPagination</code> annotation to add some query parameters.</p>
<p>The sample response is gotten by Scribe making a test API call (aka &quot;response call&quot;).</p>

<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://testapi.com/api/users?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/users"
);

const params = {
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://testapi.com/api/users',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'page'=&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 54
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Pete&quot;,
            &quot;email&quot;: &quot;pete@home.com&quot;,
            &quot;side_projects&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;iusto ut dolor&quot;,
                    &quot;description&quot;: &quot;Voluptatem aspernatur dolorem quae quaerat harum.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20301215,
                    &quot;created_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
                    &quot;user_id&quot;: 1
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;corporis consequuntur amet&quot;,
                    &quot;description&quot;: &quot;Dolores eveniet deleniti voluptatem saepe expedita.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20230712,
                    &quot;created_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
                    &quot;user_id&quot;: 1
                },
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;nihil voluptate quaerat&quot;,
                    &quot;description&quot;: &quot;Animi reprehenderit soluta id quo.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20290603,
                    &quot;created_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
                    &quot;user_id&quot;: 1
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;vel perspiciatis quo&quot;,
                    &quot;description&quot;: &quot;Et qui praesentium consequatur distinctio natus.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20210605,
                    &quot;created_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
                    &quot;user_id&quot;: 1
                },
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;qui et totam&quot;,
                    &quot;description&quot;: &quot;Veritatis quo dolorum soluta ut.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20270203,
                    &quot;created_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
                    &quot;user_id&quot;: 1
                }
            ]
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Alexane Weber&quot;,
            &quot;email&quot;: &quot;lacy.wintheiser@example.net&quot;,
            &quot;side_projects&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;voluptas assumenda maiores&quot;,
                    &quot;description&quot;: &quot;Consequuntur aut ea est non.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20310222,
                    &quot;created_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:21:59.000000Z&quot;,
                    &quot;user_id&quot;: 2
                }
            ]
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;John Kshlerin II&quot;,
            &quot;email&quot;: &quot;titus77@example.com&quot;,
            &quot;side_projects&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;provident et consequatur&quot;,
                    &quot;description&quot;: &quot;Quos et ipsum cum pariatur ex perspiciatis eius.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20231022,
                    &quot;created_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:23:25.000000Z&quot;,
                    &quot;user_id&quot;: 3
                }
            ]
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Rebeca Morissette&quot;,
            &quot;email&quot;: &quot;cole.geoffrey@example.com&quot;,
            &quot;side_projects&quot;: [
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;optio excepturi ea&quot;,
                    &quot;description&quot;: &quot;Error deleniti sint a nostrum consequuntur et.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20260324,
                    &quot;created_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:24:27.000000Z&quot;,
                    &quot;user_id&quot;: 4
                }
            ]
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Prof. Adah Witting IV&quot;,
            &quot;email&quot;: &quot;nswift@example.net&quot;,
            &quot;side_projects&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;name&quot;: &quot;aspernatur architecto assumenda&quot;,
                    &quot;description&quot;: &quot;Nisi ea aut vel sint vero voluptas tempore.&quot;,
                    &quot;url&quot;: null,
                    &quot;due_at&quot;: 20280710,
                    &quot;created_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2021-05-30T00:25:43.000000Z&quot;,
                    &quot;user_id&quot;: 5
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="page"
               data-endpoint="GETapi-users"
               value="1"
               data-component="query" hidden>
    <br>
<p>Page number to return. This parameter was added by a custom strategy.</p>
            </p>
                    <p>
                <b><code>pageSize</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="pageSize"
               data-endpoint="GETapi-users"
               value=""
               data-component="query" hidden>
    <br>
<p>Number of items to return in a page. Defaults to 10. This parameter was added by a custom strategy.</p>
            </p>
                </form>

                    <h2 id="-POSTapi-users--id--auth">Authenticate</h2>

<p>
</p>

<p>Get a new API token.</p>
<aside>Yes, we know you can impersonate any user.🙄</aside>

<span id="example-requests-POSTapi-users--id--auth">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://testapi.com/api/users/1/auth" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://testapi.com/api/users/1/auth"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://testapi.com/api/users/1/auth',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-users--id--auth">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;token&quot;: &quot;2|KLDoUXc68Ko0JaFDZoX9qYkUqWglwdGxQsvTGBCg&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-users--id--auth" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users--id--auth"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users--id--auth"></code></pre>
</span>
<span id="execution-error-POSTapi-users--id--auth" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users--id--auth"></code></pre>
</span>
<form id="form-POSTapi-users--id--auth" data-method="POST"
      data-path="api/users/{id}/auth"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users--id--auth', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users--id--auth"
                    onclick="tryItOut('POSTapi-users--id--auth');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users--id--auth"
                    onclick="cancelTryOut('POSTapi-users--id--auth');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users--id--auth" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users/{id}/auth</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="POSTapi-users--id--auth"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <p>
            <b><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
<br>
<p>The new API token. Valid forever.</p>
        </p>
                

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>