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
            background-color: #ffe23b;
            padding: 20px;
            border-radius: 10px;
            width: 550px;
            height: 270px;
            margin: 0 auto;
            margin-right: 15px;
            margin-left: 15px;
        }

        .bubble-left {
            width: 30%;
        }

        .bubble-center {
            width: 40%;
        }

        .bubble-right {
            width: 30%;
        }

        .bubble input[type=text] {
            margin: 20px auto 0;
            align-self: center;
        }

        .analog-clock {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #fff;
            position: relative;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .analog-clock::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 15px;
            height: 15px;
            background-color: #333;
            border-radius: 50%;
            z-index: 1;
        }

        .analog-clock .hour-hand,
        .analog-clock .minute-hand {
            position: absolute;
            background-color: #333;
            border-radius: 5px;
            transform-origin: bottom center;
            z-index: 2;
        }

        .analog-clock .hour-hand {
            width: 6px;
            height: 40%;
            top: 30%;
            left: 50%;
            transform: translateX(-50%);
        }

        .analog-clock .minute-hand {
            width: 4px;
            height: 45%;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
        }

        .analog-clock .second-hand {
            display: none;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto flex justify-between">
            <div class="bubble bubble-left">
                <!-- Bubble kiri -->
                <div class="analog-clock">
                    <div class="hour-hand"></div>
                    <div class="minute-hand"></div>
                </div>
            </div>

            <div class="bubble bubble-center">
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
            <div class="bubble bubble-right">
                <!-- Bubble kanan -->
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("keydown", () => {
            document.getElementById("textarea").focus()
        });
    </script>

</x-app-layout>
