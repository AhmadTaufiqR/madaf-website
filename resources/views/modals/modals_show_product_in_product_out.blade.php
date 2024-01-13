<!-- Modal Scroll long content -->
{{-- <div class="col-lg-4 col-md-3"> --}}
  <!-- Modal -->
  <div class="modal fade" id="editModalDetail-{{ $Product_outs->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalScrollableTitle">List Barang</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <ul>
          @foreach ($detail_out as $detail_out_product)
            @if ($detail_out_product->detail_product_out === $Product_outs->id)
              @foreach ($detail_product as $detail)
                @if ($detail->products === $detail_out_product->products)
                  <li>{{ $detail->name }}   : {{ $detail_out_product->total_quantity }}</li>
                @endif
              @endforeach
            @endif
          @endforeach
        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>