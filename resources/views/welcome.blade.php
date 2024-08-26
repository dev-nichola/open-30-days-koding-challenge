<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">

    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-DaN8u4V-.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #000;
        }
        .bg-white {
            background-color: #fff; /* Ensure background color is white */
        }
        .text-gray-900 {
            color: #000; /* Override gray color to black */
        }
        .text-gray-800 {
            color: #000; /* Override gray color to black */
        }
        .text-red-500 {
            color: #f00; /* Red color for links */
        }
        .text-blue-500 {
            color: #007bff; /* Blue color for links */
        }
    </style>
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:text-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-900 space-y-6">

                    <div class="flex lg:hidden lg:flex-row gap-4 text-blue-600">
                        @if(auth()->check())
                        <a href="{{ route('task.index') }}" class="text-lg hover:underline">My Task</a>
                        @else
                        <a href="{{ route('login') }}" class="text-lg hover:underline">Login</a>
                        <a href="{{ route('register') }}" class="text-lg hover:underline">Register</a>
                        @endif
                    </div>

                    <div class="flex flex-col lg:flex-row lg:justify-between">
                        <div class="mb-4 lg:mb-0">
                            <h1 class="text-4xl lg:text-5xl py-10 font-bold">Hola Programmer!</h1>
                        </div>
                        <div class="lg:flex hidden lg:flex-row gap-4 text-blue-600">
                            @if(auth()->check())
                            <a href="{{ route('task.index') }}" class="text-lg hover:underline">My Task</a>
                            @else
                            <a href="{{ route('login') }}" class="text-lg hover:underline">Login</a>
                            <a href="{{ route('register') }}" class="text-lg hover:underline">Register</a>
                            @endif
                        </div>
                    </div>

                    <p>Selamat karena kamu telah menemukan ini. Ingat, kalau mau jadi seorang programmer itu bukan hanya tentang menulis kode, tapi juga tentang komitmen. Jika kamu sudah memutuskan untuk menempuh jalan ini, pastikan niatmu kuat untuk menyelesaikan setiap tantangan yang ada. Dengan niat yang kuat, tidak ada yang tidak mungkin. Semangat!</p>

                    <div class="text-md quote font-semibold before:content-[attr(before)]">
                        <p>Apa yang kamu mulai harus kamu selesaikan, jangan kendor, jangan kabur di tengah jalan!</p>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">30 Days - Koding</h1>
                        <p>Ya, koding, ngesolve task yang sudah diberikan admin.</p>
                        <p>Grup ini untuk apa? Untuk diskusi, tanya-tanya, dan menyelesaikan masalah yang ada. Jadi, nggak sebatas cuma challenge ini.</p>
                        <p>Di luar Laravel juga boleh tanya-tanya!</p>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">Selain ngesolve kodingan sendiri, ngapain aja ya nanti? 🙂</h1>
                        <p>Apa saja kegiatannya? Selain kegiatan 30 Days - Koding Laravel ini, kita ada juga kegiatan namanya <span class="font-bold italic">Malam Minggu Solving!</span></p>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">Malam Minggu Solving? 🫨</h1>
                        <p>Jadi, setiap malam Minggu kita adakan live coding! Live coding...?, yap, kita bakal ngesolve problem yang ada.</p>
                        <p>Eh, maksudnya gimana? Jadi...</p>
                        <ol class="list-decimal list-inside space-y-2">
                            <li>Pas Sabtu siang, admin bakal ngasih form yang intinya kalau ada ide, taruh saja di situ.</li>
                            <li>Langkah keduanya, admin bakal menyeleksi ide-ide yang cukup menantang dan disesuaikan tentunya (admin di sini punya hak prerogatif ya...)</li>
                            <li>Nah, pas malamnya kita live bareng di Discord (entar ya Discord-nya lagi dibikin...)</li>
                            <li>Cara menentukan siapa yang live coding gimana? Yang pertama, kita list dulu ya sebelum live siapa yang mau ikutan. Admin bakal infoin nanti di WhatsApp. Trus nih kita pake <a href="https://wheelofnames.com/" class="text-red-500">Wheelspin dong...</a></li>
                            <li>Trus moderatornya siapa? Admin? Atau kenalan admin? Hmmm nanti moderatornya bakal di <a href="https://wheelofnames.com/" class="text-red-500">Wheelspin lagi dong...</a></li>
                        </ol>
                    </div>

                    <div class="font-bold">
                        🫀 Dag dig dug, ehh tenang aja, admin pastiin gak gigit kok. Semua ini buat ajang latihan, bree. Tenang aja...
                    </div>

                    <div class="font-bold">
                        🗣️: Kapan? Besok? Atau lusa? <br>
                        <p>Nanti bree, setelah 10 hari kita udah jalan, terhitung mulai besok, Senin, tanggal 26 Agustus 2024.</p>
                        <p>🗣️: Lho kok lama banget, kok gitu sih, min? Jadi buat kita menyesuaikan aja dulu kalau ada member baru dan menyesuaikan kalau ada pemula yang mau koding biar istilahnya skill-nya sama dengan yang udah pro.</p>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold text-red-500">Eh trus yang nggak live coding ngapain?</h1>
                        <p>Ya, koding dong, tapi enggak live aja sih...</p>
                        <p>Tapi ya wajib bantu-bantu kalau yang live coding nyetuk.</p>
                        <p>Moderator juga ikut koding yaaa.</p>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">Peraturan ⚙️</h1>
                        <p>Simple aja sih, gak boleh pake AI, tapi boleh pake search engine.</p>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">Sumber Belajar</h1>
                        <div class="pt-4">
                            <label class="font-bold">PHP Dasar :</label>
                            <a href="https://nicholasaputra.notion.site/PHP-Dasar-Sampai-Mahir-ec458efdd8b34dc7ac79fd1ac322afc6?pvs=4" class="block text-blue-500">PHP Dasar: Pemula Sampai Mahir</a>
                        </div>

                        <div class="pt-4">
                            <label class="font-bold">PHP OOP :</label>
                            <a href="https://nicholasaputra.notion.site/PHP-OOP-Pemula-Sampai-Over-Power-e82bf24576f74d6193eec046a0e8f827?pvs=4" class="block text-blue-500">PHP OOP: Pemula Sampai Mahir</a>
                        </div>

                        <div class="pt-4">
                            <label class="font-bold">Belajar Javascript :</label>
                            <a href="https://sko.dev/referensi/javascript/apa-itu-javascript" class="block text-blue-500">Javascript: Pemula Hingga Bisa!</a>
                        </div>

                        <div class="pt-4">
                            <label class="font-bold">Laravel Dasar :</label>
                            <a href="https://nicholasaputra.notion.site/PHP-OOP-Pemula-Sampai-Over-Power-e82bf24576f74d6193eec046a0e8f827?pvs=4" class="block text-blue-500">Laravel Dasar: Pemula Sampai Mahir</a>
                        </div>

                        <div class="pt-4">
                            <label class="font-bold">Laravel Eloquent :</label>
                            <a href="https://nicholasaputra.notion.site/Laravel-Eloquent-Everything-is-ORM-c7a5fe53f589428099613f05b3a32583?pvs=4" class="block text-blue-500">Laravel Eloquent: Dasar Hingga Pro</a>
                        </div>
                    </div>

                    <div>
                        <p>Setelah ini kamu bisa belajar Livewire, atau jQuery, atau Vue, bahkan bisa React. Terserah kamu aja sih.</p>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">Buat ke depannya gimana, min?</h1>
                        <p>Rencananya sih bakal kita lanjutin ya ke 60 Days Koding Challenge dan ekspansi ke teknologi-teknologi lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
