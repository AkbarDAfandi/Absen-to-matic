<x-app-layout>
    <style type="text/css">
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
            background-color: #d2d2d2;
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

        @import url('https://fonts.googleapis.com/css?family=Orbitron');

        #digit_clock_time {
            font-family: 'Work Sans', sans-serif;
            color: #000000;
            font-size: 40px;
            text-align: center;
            padding-top: 20px;
        }

        #digit_clock_date {
            font-family: 'Work Sans', sans-serif;
            color: #000000;
            font-size: 22px;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .digital_clock_wrapper {
            padding: 25px;
            max-width: 350px;
            width: 100%;
            text-align: center;
            border-radius: 5px;
            margin: 0 auto;
        }

        .foto {
            scale: 55%;
        }
    </style>

    <div class="py-12">
        @if ($errors->any())
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 overflow-auto">
                <div role="alert" class="alert alert-error sm:table-auto mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Error! Data tidak ditemukan.</span>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto flex justify-between">
            <div class="bubble bubble-left">
                <!-- Bubble kiri -->
                @if (isset($person))
                <ul class="foto" class="">
                    <img src="{{ $person->image_url }}">
                </ul>
                @else
                <ul class="info-list" class="">
                    <p>Foto Tidak Ditemukan</p>
                </ul>
                @endif

            </div>
            <div class="bubble bubble-center">
                <form name="nipd_inpt" action="{{ route('dashGuru.search') }}" method="POST" class="mb-5"
                    wire:submit="addHistory()">
                    @csrf
                    <input id="textarea" type="text"
                        class="block w-full mt-2 text-gray-700 bg-white border border-gray-20" name="nipd"
                        value="{{ old('nipd') }}" autocomplete="off" placeholder="NIPD" style="margin: 0 auto;"
                        wire:model="nipd">

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
                <div class="digital_clock_wrapper">
                    <div id="digit_clock_time"></div>
                    <div id="digit_clock_date"></div>
                </div>
            </div>
        </div>
        @livewire('history')

        <script>
            window.addEventListener("keydown", () => {
                document.getElementById("textarea").focus()
            });
        </script>
        <script type="text/javascript">
            function currentTime() {
                var date = new Date(); // Creating object of Date class
                var hour = date.getHours();
                var min = date.getMinutes();
                var sec = date.getSeconds();

                // Adjusting hour to  24-hour format directly
                hour = (hour < 10 ? "0" : "") + hour; // Adding leading zero if hour is less than  10
                min = (min < 10 ? "0" : "") + min; // Adding leading zero if minute is less than  10
                sec = (sec < 10 ? "0" : "") + sec; // Adding leading zero if second is less than  10

                document.getElementById("digit_clock_time").innerText = hour + " : " + min + " : " +
                    sec; // Adding time to the div


                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September',
                    'Oktober',
                    'November', 'Desember'
                ];
                var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

                var curWeekDay = days[date.getDay()]; // get day
                var curDay = date.getDate(); // get date
                var curMonth = months[date.getMonth()]; // get month
                var curYear = date.getFullYear(); // get year
                var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
                document.getElementById("digit_clock_date").innerHTML = date;

                var t = setTimeout(currentTime, 1000); /* setting timer */
            }

            function changeTime(k) {
                /* appending 0 before time elements if less than 10 */
                if (k < 10) {
                    return "0" + k;
                } else {
                    return k;
                }
            }

            currentTime();
        </script>

</x-app-layout>
