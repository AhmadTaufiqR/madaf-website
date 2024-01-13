

<!-- ... Bagian lain dari konten ... -->

{{-- @foreach($product_outs as $Product_outs) --}}
    <!-- Large Modal Add -->
    <div class="modal fade" id="editModalTambah-{{ $Product_outs->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('product-out/add-product-out', $Product_outs->id) }}" class="demo-vertical-spacing demo-only-element" method="POST" autocomplete="off">
                        @csrf

                        <div class="mt-2">
                            <label class="form-label" for="name">Product</label>
                            <select id="selectproductproduct-{{ $Product_outs->id }}" class="form-select" name="product_selected" onchange="updatePrice({{ $Product_outs->id }})" required>
                                <option value="default">Silahkan dipilih</option>
                                @foreach ($product_all as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-2">
                            <label class="form-label" for="name">Jumlah</label>
                            <div class="input-group">
                                <input type="number" id="jumlahInput-{{ $Product_outs->id }}" class="form-control" onkeyup="updatePrice({{ $Product_outs->id }})" name="quantity_add" placeholder="Jumlah Barang" aria-label="Jumlah Barang" aria-describedby="basic-addon11" required />
                            </div>
                        </div>

                        <div class="mt-2">
                            <label class="form-label" for="name">Harga</label>
                            <div class="input-group">
                                <input type="number" id="hargaInputProduct-{{ $Product_outs->id }}" class="form-control" name="price_add" placeholder="Harga" aria-label="Harga" aria-describedby="basic-addon11" required readonly />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" name="submit" id="btn_save_add" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- @endforeach --}}

<script>
    function updatePrice(productOutsId) {
        var selectElement = document.getElementById('selectproductproduct-' + productOutsId);
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var selectedPrice = selectedOption.getAttribute('data-price');
        var jumlahInput = document.getElementById('jumlahInput-' + productOutsId).value;
        var hargatulis = document.getElementById('hargaInputProduct-' + productOutsId);

        if (jumlahInput !== '') {
            hargatulis.value = selectedPrice * parseFloat(jumlahInput);
        } else {
            hargatulis.value = '';
        }
    }
</script>
