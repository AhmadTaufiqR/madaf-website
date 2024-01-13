<!-- Large Modal Add -->
<div class="modal fade" id="editModal-{{ $Product_outs->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('product-out/edit-out/'.$Product_outs->id) }}" class="demo-vertical-spacing demo-only-element" method="POST" autocomplete="off">
                    @csrf
                    
                    <div class="mt-2">
                        <label class="form-label" for="name">Tanggal kirim</label>
                        <div class="input-group">
                            <input type="date" value="{{ $Product_outs->date }}" class="form-control" name="date_add" placeholder="Tanggal kirim" aria-label="Tanggal kirim" aria-describedby="basic-addon11" />
                        </div>
                    </div>
                    <div class="mt-2">
                      <label class="form-label" for="price">Methode</label>
                      <div class="input-group">
                          <select id="selectmethodedit-{{ $Product_outs->id }}" class="form-select"  name="method_selected" onchange="checkSelect({{ $Product_outs->id }})">
                              <option value="{{ $Product_outs->method }}">Silahkan Pilih</option>
                              <option value="cash">cash</option>
                              <option value="bon">bon</option>
                              <option value="tempo">tempo</option>
                          </select>
                      </div>
                  </div>
                  <div hidden id="bonselectedit-{{ $Product_outs->id }}" class="mt-2">
                      <label class="form-label" for="price">Bon</label>
                      <div class="input-group">
                          <input type="number" class="form-control" value="{{ $Product_outs->amount }}" name="bon_add" placeholder="Bon" aria-label="Bon" aria-describedby="basic-addon11" />
                      </div>
                  </div>
                  <div hidden id="temposelectedit-{{ $Product_outs->id }}" class="mt-2">
                      <label class="form-label" for="price">Tanggal Tempo</label>
                      <div class="input-group">
                          <input type="date" class="form-control" value="{{ $Product_outs->date_tempo }}" name="date_tempo_add" placeholder="Tanggal Tempo" aria-label="Tanggal Tempo" aria-describedby="basic-addon11" />
                      </div>
                  </div>
                    <div class="mt-2">
                        <label class="form-label" for="price">Status</label>
                        <div class="input-group">
                            <select id="selectstatus" class="form-select" name="status_selected">
                                <option value="{{ $Product_outs->status }}">{{ $Product_outs->status }}</option>
                                @if ($Product_outs->status  !== 'Belum lunas')
                                <option value="Belum lunas">Belum lunas</option>
                                @elseif ($Product_outs->status  !== 'Lunas')
                                <option value="Lunas">Lunas</option>
                                @endif
                            </select>
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