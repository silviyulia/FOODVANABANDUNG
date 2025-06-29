<!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('checkout.update') }}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title" id="editModalLabel">Edit Informasi Pemesanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama Penerima</label>
                                    <input type="text" name="username" class="form-control" value="{{ old('username', $user['username'] ?? $user['name']) }}">
                                </div>
                                <div class="mb-3">
                                    <label>Alamat Pengiriman</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $user['alamat'] ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label>No HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $user['no_hp'] ?? '') }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>