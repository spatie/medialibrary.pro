<button
    class="button"
    data-product-label="{{ $product->label }}"
    data-product-id="{{ $product->paddle_product_id }}"
    data-license="{{ isset($license) ? $license->key : '' }}">
    {{ $slot }}
</button>
