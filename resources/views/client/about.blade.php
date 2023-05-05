@extends('layouts.app')

@section('content')
    <section id="about-us" class="container shadow-lg rounded-4">
        <div class="about-text p-4">
            <h1>Biz Haqimizda</h1>
            <hr>
            <div class="about-title">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos voluptate cupiditate eligendi aliquid
                    voluptates magni quisquam ullam provident, neque iusto vero eaque iure, facere quas natus, earum
                    corporis
                    repellat excepturi ea reiciendis error consequuntur impedit. Explicabo nulla autem facilis temporibus
                    tempore dignissimos ex mollitia, fugit, magnam culpa nihil, molestias nisi quam quo at dolorum numquam
                    ducimus provident cum quod facere! Facere suscipit repudiandae deleniti sint nesciunt molestiae neque
                    porro
                    quibusdam corrupti iusto adipisci, enim quae harum inventore saepe accusamus, consequuntur beatae soluta
                    nobis ratione illo ullam iste doloribus. Odit temporibus a nostrum laudantium. Adipisci minus
                    reprehenderit
                    dolorem dicta, recusandae sint.</p>
            </div>
            @php
                $regions = ['Xorazm', 'Toshkent', 'Samarqand', 'Fargona', 'Jizzax', 'Namangan', 'Buxoro', 'Andijon', 'Sirdaryo', 'Surxondaryo', 'Navoiy', 'Qashqadaryo'];
            @endphp
            <div class="accordion" id="accordionExample">
                @foreach ($regions as $region)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $region }}" aria-expanded="false"
                                aria-controls="collapse{{ $region }}">
                                {{ $region === 'Fargona' ? 'Farg\'ona' : $region }} viloyati
                            </button>
                        </h2>
                        <div id="collapse{{ $region }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These
                                classes
                                control the overall appearance, as well as the showing and hiding via CSS transitions. You
                                can
                                modify any of this with custom CSS or overriding our default variables. It's also worth
                                noting
                                that just about any HTML can go within the <code>.accordion-body</code>, though the
                                transition
                                does limit overflow.
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
