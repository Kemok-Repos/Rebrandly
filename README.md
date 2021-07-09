# Rebrandly
Rebrandly API wrapper for Laravel. 

## Installation
<pre><code>composer install Kemok-Repos/Rebrandly</pre></code>

## Usage

### Create shortlink
Call the create function with the long Url you want to shrink.

<pre><code>Rebrandly::create(["destination" => "https://www.google.com"])</pre></code>

### Update shortlink
Pass the shortlink ID and the properties you want to change to the update function.

<pre><code>Rebrandly::update("shortlink-ID", ["destination" => "https://www.youtube.com"])</pre></code>

### Notes:
Check [Rebrandly's API documentation](https://developers.rebrandly.com/docs/api-custom-url-shortener) to know more about the properties you have access to.
