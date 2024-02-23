<x-app-layout>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

        .clock {
            background: #ececec;
            width: 240px;
            height: 300px;
            margin: auto 0;
            border-radius: 50%;
            border: 14px solid #333;
            position: relative;
            box-shadow: 0 2vw 4vw -1vw rgba(0, 0, 0, 0.8);
            scale: 50%;
        }

        .dot {
            width: 14px;
            height: 20px;
            border-radius: 50%;
            background: #ccc;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            position: absolute;
            z-index: 10;
            box-shadow: 0 2px 4px -1px black;
        }

        .hour-hand {
            position: absolute;
            z-index: 5;
            width: 4px;
            height: 65px;
            background: #333;
            top: 79px;
            transform-origin: 50% 72px;
            left: 50%;
            margin-left: -2px;
            border-top-left-radius: 50%;
            border-top-right-radius: 50%;
        }

        .minute-hand {
            position: absolute;
            z-index: 6;
            width: 4px;
            height: 100px;
            background: #666;
            top: 46px;
            left: 50%;
            margin-left: -2px;
            border-top-left-radius: 50%;
            border-top-right-radius: 50%;
            transform-origin: 50% 105px;
        }

        .second-hand {
            position: absolute;
            z-index: 7;
            width: 2px;
            height: 120px;
            background: gold;
            top: 26px;
            lefT: 50%;
            margin-left: -1px;
            border-top-left-radius: 50%;
            border-top-right-radius: 50%;
            transform-origin: 50% 125px;
        }

        span {
            display: inline-block;
            position: absolute;
            color: #333;
            font-size: 22px;
            font-family: 'Poiret One';
            font-weight: 700;
            z-index: 4;
        }

        .h12 {
            top: 30px;
            left: 50%;
            margin-left: -9px;
        }

        .h3 {
            top: 140px;
            right: 30px;
        }

        .h6 {
            bottom: 30px;
            left: 50%;
            margin-left: -5px;
        }

        .h9 {
            left: 32px;
            top: 140px;
        }

        .diallines {
            position: absolute;
            z-index: 2;
            width: 2px;
            height: 15px;
            background: #666;
            left: 50%;
            margin-left: -1px;
            transform-origin: 50% 150px;
        }

        .diallines:nth-of-type(5n) {
            position: absolute;
            z-index: 2;
            width: 4px;
            height: 25px;
            background: #666;
            left: 50%;
            margin-left: -1px;
            transform-origin: 50% 150px;
        }

        .info {
            position: absolute;
            width: 120px;
            height: 20px;
            border-radius: 7px;
            background: #ccc;
            text-align: center;
            line-height: 20px;
            color: #000;
            font-size: 11px;
            top: 200px;
            left: 50%;
            margin-left: -60px;
            font-family: "Poiret One";
            font-weight: 700;
            z-index: 3;
            letter-spacing: 3px;
            margin-left: -60px;
            left: 50%;
        }

        .date {
            top: 80px;
        }

        .day {
            top: 200px;
        }

    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto flex justify-between">
            <div class="bubble bubble-left">
                <!-- Bubble kiri -->
                <div class="clock">
                    <div>
                        <div class="info date"></div>
                        <div class="info day"></div>
                    </div>
                    <div class="dot"></div>
                    <div>
                        <div class="hour-hand"></div>
                        <div class="minute-hand"></div>
                        <div class="second-hand"></div>
                    </div>
                    <div>
                        <span class="h3">3</span>
                        <span class="h6">6</span>
                        <span class="h9">9</span>
                        <span class="h12">12</span>
                    </div>
                    <div class="diallines"></div>
                </div>
            </div>

            <div class="bubble bubble-center">
                <form name="nipd_inpt" action="{{ route('dashGuru.search') }}" method="POST" class="mb-5">
                    @csrf
                    <input id="textarea" type="text" class="block w-full mt-2 text-gray-700 bg-white border border-gray-20" name="nipd" value="{{ old('nipd') }}" autocomplete="off" placeholder="NIPD" style="margin: 0 auto;">

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

            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table w-50">
              <!-- head -->
              <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>NIPD</th>
                  <th>Kelas</th>
                  <th>Nama</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = $history_scans->firstItem() ?>
                    @foreach ($history_scans as $history)
                    <tr>
                        <td class="editable">{{ $history->NIPD }}</td>
                        <td class="editable">{{ $history->Kelas }}</td>
                        <td class="editable">{{ $history->Jurusan }}</td>
                        <td class="editable">{{ $history->{'No Absen'} }}</td>
                        <td class="editable">{{ $history->Nama }}</td>
                        <td class="editable">{{ $history->{'Jenis Kelamin'} }}</td>

                    </tr>
                    <?php $i++ ?>
                    @endforeach
              </tbody>
            </table>
          </div>
    </div>

    <script>
        window.addEventListener("keydown", () => {
            document.getElementById("textarea").focus()
        });

    </script>
    <script async>
        var dialLines = document.getElementsByClassName('diallines');
        var clockEl = document.getElementsByClassName('clock')[0];

        for (var i = 1; i < 60; i++) {
            clockEl.innerHTML += "<div class='diallines'></div>";
            dialLines[i].style.transform = "rotate(" + 6 * i + "deg)";
        }

        function clock() {
            var weekday = [
                    "Sunday"
                    , "Monday"
                    , "Tuesday"
                    , "Wednesday"
                    , "Thursday"
                    , "Friday"
                    , "Saturday"
                ]
                , d = new Date()
                , h = d.getHours()
                , m = d.getMinutes()
                , s = d.getSeconds()
                , date = d.getDate()
                , month = d.getMonth() + 1
                , year = d.getFullYear(),

                hDeg = h * 30 + m * (360 / 720)
                , mDeg = m * 6 + s * (360 / 3600)
                , sDeg = s * 6,

                hEl = document.querySelector('.hour-hand')
                , mEl = document.querySelector('.minute-hand')
                , sEl = document.querySelector('.second-hand')
                , dateEl = document.querySelector('.date')
                , dayEl = document.querySelector('.day');

            var day = weekday[d.getDay()];

            if (month < 9) {
                month = "0" + month;
            }

            hEl.style.transform = "rotate(" + hDeg + "deg)";
            mEl.style.transform = "rotate(" + mDeg + "deg)";
            sEl.style.transform = "rotate(" + sDeg + "deg)";
            dateEl.innerHTML = date + "/" + month + "/" + year;
            dayEl.innerHTML = day;
        }

        setInterval("clock()", 100);

    </script>

</x-app-layout>

