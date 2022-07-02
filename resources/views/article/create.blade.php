@include('header')
 
<div class="container ">
    <div class="row justify-content-center"style="padding-top:100px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kalori') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/home')}}">
                        @csrf

                            <div class="form-group row">
                                <label for="jumlah_kalori" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Kalori :') }}</label>
                                <div class="col-md-6">
                                    <input id="jumlah_kalori" type="text" class="form-control @error('jumlah_kalori') is-invalid @enderror" name="jumlah_kalori" value="{{ old('jumlah_kalori') }}"  placeholder="Masukkan jumlah kalori">
                                    @error('jumlah_kalori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                               <button type="submit" class="btn btn-primary" >Tambah Data</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')