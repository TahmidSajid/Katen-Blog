@extends('layouts.frontend')
@section('content')
    <section class="main-content">
        <div class="container-xl">

            <div class="row">

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-phone"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">Phone</h3>
                            <p class="mb-0">+1-202-555-0135</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-envelope-open"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">E-Mail</h3>
                            <p class="mb-0">hello@example.com</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-map"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">Location</h3>
                            <p class="mb-0">California, USA</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="spacer" data-height="50"></div>

            <!-- section header -->
            <div class="section-header">
                <h3 class="section-title">Send Message</h3>
                <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
            </div>

            <!-- Contact Form -->
            <form id="contact-form" class="contact-form" action="{{ route('contact_form') }}" method="post">
                @csrf
                <div class="messages"></div>

                <div class="row">
                    <div class="column col-md-12">
                        <!-- Name input -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="InputName"
                                placeholder="Your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="column col-md-12">
                        <!-- Email input -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="InputSubject" name="email" placeholder="email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-12">
                        <!-- Message textarea -->
                        <div class="form-group">
                            <textarea name="text" id="InputMessage" class="form-control" rows="4" placeholder="Your message here..."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-default">
                    Submit Message
                </button><!-- Send Button -->
            </form>
            <!-- Contact Form end -->
        </div>
    </section>
@endsection

@if (session('message_sent'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('message_sent') }}"
            });
        </script>
    @endsection
@endif
