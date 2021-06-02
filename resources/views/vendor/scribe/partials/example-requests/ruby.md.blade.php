@php
    /** @var  Knuckles\Camel\Output\OutputEndpointData $endpoint */
@endphp

```ruby

require 'rest-client'

@if(!empty($endpoint->cleanBodyParameters))
body = {!! json_encode($endpoint->cleanBodyParameters, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
@endif
@if(!empty($endpoint->headers))
headers = {
@foreach($endpoint->headers as $header => $value)
    "{{$header}}": "{{$value}}",
@endforeach
}
@endif

response = RestClient.{{strtolower($endpoint->httpMethods[0])}}(
  '{{ $baseUrl }}/{{ $endpoint->boundUri }}'@if(!empty($endpoint->cleanBodyParameters)),
  body @endif
@if(!empty($endpoint->headers)),
  headers
@endif
)

p response.body

```