<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>The SideProject API</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-elements.style.css") }}" media="screen">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/@stoplight/elements/styles.min.css">

            <style id="language-style">
            /* starts out as display none and is replaced with js later  */
                        body .content .bash-example code {
                display: none;
            }
                        body .content .javascript-example code {
                display: none;
            }
                        body .content .php-example code {
                display: none;
            }
                        body .content .python-example code {
                display: none;
            }
                        body .content .ruby-example code {
                display: none;
            }
                    </style>
    
            <script>
            var baseUrl = "http://localhost:8000";
            var useCsrf = Boolean();
            var csrfUrl = "/sanctum/csrf-cookie";
        </script>
        <script src="{{ asset("/vendor/scribe/js/tryitout-4.1.0.js") }}"></script>
    
    <script src="{{ asset("/vendor/scribe/js/theme-elements-4.1.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;,&quot;python&quot;,&quot;ruby&quot;]">


<div style="height: 100%;">
    <div data-overlay-container="true" class="" style="height: 100%;">
        <div class="sl-elements sl-antialiased sl-h-full sl-text-base sl-font-ui sl-text-body">
            <div class="sl-elements-api sl-flex sl-inset-0 sl-h-full">

                <div class="sl-flex sl-overflow-y-auto sl-flex-col sl-sticky sl-inset-y-0 sl-pt-8 sl-bg-canvas-100 sl-border-r"
     style="width: calc((100% - 1800px) / 2 + 300px); padding-left: calc((100% - 1800px) / 2); min-width: 300px;">
    <div class="sl-flex sl-items-center sl-mb-5 sl-ml-4">
                    <div class="sl-inline sl-overflow-x-hidden sl-overflow-y-hidden sl-mr-3 sl-rounded-lg"
                 style="background-color: transparent;">
                <img src="https://github.com/knuckleswtf/scribe/raw/master/logo-scribe.png" height="30px" width="30px" alt="logo">
            </div>
                <h4 class="sl-text-paragraph sl-leading-snug sl-font-prose sl-font-semibold sl-text-heading">
            The SideProject API
        </h4>
    </div>

    <div class="sl-flex sl-overflow-y-auto sl-flex-col sl-flex-grow sl-flex-shrink">
        <div class="sl-overflow-y-auto sl-w-full sl-bg-canvas-100">
            <div class="sl-my-3">
                                    <div title="Introduction"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#introduction">Introduction</a>
                        </div>
                                                    <div class="sl-flex sl-items-center sl-text-xs">
                                <div class="sl-flex sl-items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down"
                                         class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                    </svg>
                                </div>
                            </div>
                                            </div>

                                            <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-just-a-heading" title="just-a-heading">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#just-a-heading">
                                    Just a heading
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                                <div title="And then another!"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#and-then-another">And then another!</a>
                        </div>
                                            </div>

                                                        <div title="Authenticating requests"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#authenticating-requests">Authenticating requests</a>
                        </div>
                                            </div>

                                                        <div title="Dummy endpoints"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#dummy-endpoints">Dummy endpoints</a>
                        </div>
                                                    <div class="sl-flex sl-items-center sl-text-xs">
                                <div class="sl-flex sl-items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down"
                                         class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                    </svg>
                                </div>
                            </div>
                                            </div>

                                            <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-dummy-endpoints-another-subgroup" title="dummy-endpoints-another-subgroup">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#dummy-endpoints-another-subgroup">
                                    Another subgroup
                                    </a>
                                </div>
                                </div>
                                                            <div class="sl-flex sl-items-center sl-text-xs">
                                    <div class="sl-flex sl-items-center">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                             data-icon="chevron-down"
                                             class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                  d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                        </svg>
                                    </div>
                                </div>
                                                    </div>

                                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#dummy-endpoints-GETapi-v1-languages">
                                <div id="sl-toc-dummy-endpoints-GETapi-v1-languages" title="dummy-endpoints-GETapi-v1-languages"
                                     class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-12 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                                    <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">GET api/v1/languages</div>
                                </div>
                            </a>
                                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#dummy-endpoints-POSTapi-file-input">
                                <div id="sl-toc-dummy-endpoints-POSTapi-file-input" title="dummy-endpoints-POSTapi-file-input"
                                     class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-12 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                                    <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">File input</div>
                                </div>
                            </a>
                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-dummy-endpoints-a-subgroup" title="dummy-endpoints-a-subgroup">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#dummy-endpoints-a-subgroup">
                                    A subgroup
                                    </a>
                                </div>
                                </div>
                                                            <div class="sl-flex sl-items-center sl-text-xs">
                                    <div class="sl-flex sl-items-center">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                             data-icon="chevron-down"
                                             class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                  d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                        </svg>
                                    </div>
                                </div>
                                                    </div>

                                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#dummy-endpoints-POSTapi-nested">
                                <div id="sl-toc-dummy-endpoints-POSTapi-nested" title="dummy-endpoints-POSTapi-nested"
                                     class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-12 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                                    <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">Nested fields</div>
                                </div>
                            </a>
                                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#dummy-endpoints-POSTapi-array-body">
                                <div id="sl-toc-dummy-endpoints-POSTapi-array-body" title="dummy-endpoints-POSTapi-array-body"
                                     class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-12 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                                    <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">Body content array</div>
                                </div>
                            </a>
                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-dummy-endpoints-POSTapi-oooooi" title="dummy-endpoints-POSTapi-oooooi">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#dummy-endpoints-POSTapi-oooooi">
                                    Other
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                                <div title="General"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#general">General</a>
                        </div>
                                                    <div class="sl-flex sl-items-center sl-text-xs">
                                <div class="sl-flex sl-items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down"
                                         class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                    </svg>
                                </div>
                            </div>
                                            </div>

                                            <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-general-GETapi-healthcheck--unnecessaryParam--" title="general-GETapi-healthcheck--unnecessaryParam--">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#general-GETapi-healthcheck--unnecessaryParam--">
                                    Healthcheck
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-general-GETapi-me" title="general-GETapi-me">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#general-GETapi-me">
                                    GET api/me
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                                <div title="Users"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#users">Users</a>
                        </div>
                                                    <div class="sl-flex sl-items-center sl-text-xs">
                                <div class="sl-flex sl-items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down"
                                         class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                    </svg>
                                </div>
                            </div>
                                            </div>

                                            <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-users-POSTapi-users" title="users-POSTapi-users">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#users-POSTapi-users">
                                    Create a user
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-users-GETapi-users--id-" title="users-GETapi-users--id-">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#users-GETapi-users--id-">
                                    Fetch a user
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-users-GETapi-users" title="users-GETapi-users">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#users-GETapi-users">
                                    View all users
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-users-DELETEapi-users--id-" title="users-DELETEapi-users--id-">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#users-DELETEapi-users--id-">
                                    Delete a user
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-users-POSTapi-users--id--auth" title="users-POSTapi-users--id--auth">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#users-POSTapi-users--id--auth">
                                    Authenticate
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                                <div title="Side Projects"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#side-projects">Side Projects</a>
                        </div>
                                                    <div class="sl-flex sl-items-center sl-text-xs">
                                <div class="sl-flex sl-items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down"
                                         class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                    </svg>
                                </div>
                            </div>
                                            </div>

                                            <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-side-projects-POSTapi-side_projects" title="side-projects-POSTapi-side_projects">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#side-projects-POSTapi-side_projects">
                                    Start a new side project
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-side-projects-GETapi-side_projects" title="side-projects-GETapi-side_projects">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#side-projects-GETapi-side_projects">
                                    View all side projects
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-side-projects-GETapi-side_projects--id-" title="side-projects-GETapi-side_projects--id-">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#side-projects-GETapi-side_projects--id-">
                                    View a side project
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-side-projects-PUTapi-side_projects--id-" title="side-projects-PUTapi-side_projects--id-">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#side-projects-PUTapi-side_projects--id-">
                                    Update a side project
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-side-projects-DELETEapi-side_projects--id-" title="side-projects-DELETEapi-side_projects--id-">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#side-projects-DELETEapi-side_projects--id-">
                                    Delete a side project
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-side-projects-POSTapi-side_projects-finish" title="side-projects-POSTapi-side_projects-finish">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#side-projects-POSTapi-side_projects-finish">
                                    Finish a side project
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                                <div title="Extras"
                         class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                        <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                            <a href="#extras">Extras</a>
                        </div>
                                                    <div class="sl-flex sl-items-center sl-text-xs">
                                <div class="sl-flex sl-items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down"
                                         class="svg-inline--fa fa-chevron-down fa-fw sl-icon sl-text-muted"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                    </svg>
                                </div>
                            </div>
                                            </div>

                                            <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-extras-POSTapi-aCustomEndpoint" title="extras-POSTapi-aCustomEndpoint">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#extras-POSTapi-aCustomEndpoint">
                                    A custom endpoint
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                    <div class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5">
                                <div id="sl-toc-extras-POSTapi-aCustomEndpoint" title="extras-POSTapi-aCustomEndpoint">

                                    <a class="ElementsTableOfContentsItem sl-block sl-no-underline" href="#extras-POSTapi-aCustomEndpoint">
                                    A custom 2
                                    </a>
                                </div>
                                </div>
                                                    </div>

                                                                        </div>

            <div class="sl-flex sl-items-center sl-px-4 sl-py-3 sl-border-t">
                Last updated: October 24, 2022
            </div>

            <div class="sl-flex sl-items-center sl-px-4 sl-py-3 sl-border-t">
                <a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a>
            </div>
        </div>
    </div>
</div>

                <div class="sl-overflow-y-auto sl-flex-1 sl-w-full sl-px-24 sl-bg-canvas">
                    <div class="sl-py-16" style="max-width: 1500px;">
                        <div class="sl-mb-10">
                            <div class="sl-flex sl-justify-between sl-items-center">
                                <div class="sl-relative">
                                    <h1 class="sl-text-5xl sl-leading-tight sl-font-prose sl-font-semibold sl-mb-4 sl-text-heading">
                                        The SideProject API
                                    </h1>
                                </div>
                                                                    <div>
                                        <button type="button" aria-label="Download" aria-haspopup="true"
                                                aria-expanded="false"
                                                class="sl-button sl-h-sm sl-text-base sl-font-medium sl-ml-2 sl-px-1.5 sl-bg-canvas hover:sl-bg-canvas-50 active:sl-bg-canvas-100 sl-rounded sl-border-button sl-border disabled:sl-opacity-60">
                                            Download
                                            <span class="sl-text-xs sl--mr-0.5 sl-ml-1">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                     data-icon="chevron-down"
                                                     class="svg-inline--fa fa-chevron-down fa-fw sl-icon" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path fill="currentColor"
                                                          d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"></path>
                                                </svg>
                                            </span>
                                        </button>

                                        <div class="sl-bg-transparent"><span hidden=""></span>
                                            <div style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; white-space: nowrap;">
                                                <button tabindex="-1" aria-label="Dismiss"></button>
                                            </div>
                                            <div data-ismodal="false" tabindex="-1"
                                                 data-testid="popover" data-ispopover="true"
                                                 class="sl-popover sl-inline-flex" role="presentation"
                                                 style="position: absolute; z-index: 100000; left: 502.045px; top: 158px; max-height: 359.091px;">
                                                <div class="sl-menu sl-menu--pointer-interactions sl-inline-block sl-overflow-y-auto sl-w-full sl-py-2 sl-bg-canvas-pure sl-cursor sl-no-focus-ring"
                                                     role="menu" style="min-width: 150px; max-width: 400px;">
                                                                                                            <div class="sl-menu-item sl-flex sl-items-center sl-text-base sl-whitespace-nowrap sl-pt-1 sl-pr-3 sl-pb-1 sl-pl-3"
                                                             role="menuitem">
                                                            <div class="sl-menu-item__title-wrapper sl-flex-1 sl-w-full sl-pr-0">
                                                                <div class="sl-truncate">
                                                                    <a href="{{ route("scribe.postman") }}" target="_blank">Postman
                                                                        collection</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                                                                                <div class="sl-menu-item sl-flex sl-items-center sl-text-base sl-whitespace-nowrap sl-pt-1 sl-pr-3 sl-pb-1 sl-pl-3"
                                                             role="menuitem">
                                                            <div class="sl-menu-item__title-wrapper sl-flex-1 sl-w-full sl-pr-0">
                                                                <div class="sl-truncate">
                                                                    <a href="{{ route("scribe.openapi") }}" target="_blank">OpenAPI
                                                                        spec</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                    </div>
                                                <div class="sl-popover__tip sl-absolute sl-text-canvas-pure"
                                                     style="top: -10px; font-size: 16px; line-height: 0; margin-left: -5px; left: 117.888px;">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                         data-icon="caret-up" class="svg-inline--fa fa-caret-up sl-icon"
                                                         role="img" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 320 512">
                                                        <path fill="currentColor"
                                                              d="M9.39 265.4l127.1-128C143.6 131.1 151.8 128 160 128s16.38 3.125 22.63 9.375l127.1 128c9.156 9.156 11.9 22.91 6.943 34.88S300.9 320 287.1 320H32.01c-12.94 0-24.62-7.781-29.58-19.75S.2333 274.5 9.39 265.4z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; white-space: nowrap;">
                                                <button tabindex="-1" aria-label="Dismiss"></button>
                                            </div>
                                            <span hidden=""></span>
                                        </div>
                                    </div>
                                                            </div>


                            <div class="sl-relative">
                                <div class="sl-prose sl-markdown-viewer sl-my-5">
                                    <h1 id="introduction">Introduction</h1>
<p>Start (and never finish) side projects with this API.</p>
<aside>
    <strong>Base URL</strong>: <code>http://testapi.com</code>
</aside>
<p>The SideProject API is a sample API, built to demonstrate <a href="http://scribe.knuckles.wtf">Scribe's</a> capabilities.</p>
<p>Lke many side projects, it is itself an unfinished API, but hopefully it should be enough to convince you to try Scribe out.😉 You can check out the source code <a href="https://github.com/knuckleswtf/TheSideProjectAPI/">on GitHub</a>.</p>
<aside class="success">Example of aside with class=success.</aside>
<aside class="warning">Example of aside with class=warning.</aside>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<h2 id="just-a-heading">Just a heading</h2>
<p>With stuff under</p>
<h1 id="and-then-another">And then another!</h1>
<p>These headings were added by editing <code>.scribe/intro.md</code></p>

                                    <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {BEARER_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by using the <code>users/auth</code> endpoint.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
