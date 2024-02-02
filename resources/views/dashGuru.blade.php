<x-app-layout>
    <style>
        ul.info-list {
            list-style-type: none;
        }

        ul.info-list li b {
            position: relative;
            display: inline-block;
            min-width: 90px;
            margin-right: 4px;
        }

        ul.info-list li b:after {
            content: ":";
            position: absolute;
            right: 0;
        }

        .bubble {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 550px;
            height: 270px;
            margin: 0 auto;
        }

        .bubble input[type=text] {
            margin: 20px auto 0;
            align-self: center;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto">
            <div class="bubble">
                <form name="nipd_inpt" action="{{ route('dashGuru.search') }}" method="POST" class="mb-5">
                    @csrf
                    <input id="textarea" type="text"
                        class="block w-full mt-2 text-gray-700 bg-white border border-gray-20" name="nipd"
                        value="{{ old('nipd') }}" autocomplete="off" placeholder="NIPD" style="margin: 0 auto;">

                    <button id="btn_submit" type="submit" class="hidden"></button>
                </form>

                <body>
                    @if (isset($person))
                        <ul class="info-list" class="">
                            <li class="editable"><b>NIPD</b> {{ $person->NIPD }}</li>
                            <li class="editable"><b>JURUSAN</b> {{ $person->Jurusan }}</li>
                            <li class="editable"><b>KELAS</b> {{ $person->Kelas }}</li>
                            <li class="editable"><b>ABSEN</b> {{ $person->{'No Absen'} }}</li>
                            <li class="editable"><b>NAMA</b> {{ $person->Nama }}</li>
                            <li class="editable"><b>KELAMIN</b> {{ $person->{'Jenis Kelamin'} }}</li>
                            <li class="editable"><b>WAKTU</b> {{ now()->format('H:i:s') }}</li>
                        </ul>
                    @else
                        <ul class="info-list" class="">
                            <li class="editable"><b>NIPD</b> -</li>
                            <li class="editable"><b>JURUSAN</b> -</li>
                            <li class="editable"><b>KELAS</b> -</li>
                            <li class="editable"><b>ABSEN</b> -</li>
                            <li class="editable"><b>NAMA</b> -</li>
                            <li class="editable"><b>KELAMIN</b> -</li>
                            <li class="editable"><b>WAKTU</b> -</li>
                        </ul>
                    @endif
                </body>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("keydown", () => {
            document.getElementById("textarea").focus()
        });
    </script>

</x-app-layout>
