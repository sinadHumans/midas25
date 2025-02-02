@include('include.header')

    <div class="container-fluid authentication-bg overflow-hidden">
        <div class="bg-overlay"></div>
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">
                            <h4 class="mt-4">Bienvenidos!</h4>
                            <p class="text-muted">Favor de ingresar sus credenciales.</p>
                        </div>

                        <div class="p-2 mt-5">
                            <form action="{{ route('usuario.login') }}" method="POST">
                                @csrf
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="clave" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="mb-sm-5">
                                    <div class="form-check float-sm-start">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="customControlInline">Recordarme</label>
                                    </div>

                                    <div class="float-sm-end">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Recuperar clave?</a>
                                    </div>
                                </div>

                                <div class="pt-3 text-center">
                                    <button class="btn btn-primary w-xl waves-effect waves-light" style="width: 100%" type="submit">Ingresar</button>
                                </div>

                            </form>
                        </div>

                        <div class="mt-5 text-center">
                            <p>©
                                <script>document.write(new Date().getFullYear())</script> Sinad. creado por hevasoft.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('include.footer')
