
{{-- Page title --}}
@section('page_title', $meta_data['title'])

{{-- Open graph meta data --}}
@isset($og_meta_data)
@section('custom_og_meta')
{!! $og_meta_data !!}
@endsection
@endisset

{{-- Description meta data --}}
@isset($meta_data['description'])
@section('custom-description', $meta_data['description'])
@endisset

{{-- Keywords meta data --}}
@isset($meta_data['keywords'])
@section('custom-keywords', $meta_data['keywords'])
@endisset

{{-- Schema markup --}}
@isset($schema_markup)
@section('schema-markup')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{$schema_markup['post_url']}}"
    },
    "headline": "{{$schema_markup['post_title']}}",
    "description": "{{$schema_markup['post_description']}}",
    "image": "{{$schema_markup['post_thumbnail']}}",  
    "author": {
        "@type": "{{$schema_markup['author_type']}}",
        "name": "{{$schema_markup['author_name']}}",
        "url": "{{$schema_markup['author_url']}}"
    },  
    "publisher": {
        "@type": "{{$schema_markup['publisher_type']}}",
        "name": "{{$schema_markup['publisher_name']}}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{$schema_markup['publisher_logo']}}"
        }
    },
    "datePublished": "{{$schema_markup['date_published']}}",
    "dateModified": "{{$schema_markup['date_modified']}}"
}
</script>
@endsection
@endisset

