<div class="container mt-10 mx-44">
    <h1 class="font-bold text-5xl lg:text-3xl text-white">Schülerausweis beantragen</h1>

    <div>
        <p class="text-gray-300 "> <?= lang('form.description') ?> </p>
    </div>
</div>
<div class="flex mx-44 items-center my-4 gap-5">
    <div class="h-10 flex items-center justify-center w-10 rounded rounded-full outline outline-green-500 text-white font-xl font-bold">
        1
    </div>
    <p class="text-xl font-semibold text-white">Informationen ihres Kindes</p></div>

<form action="" class="text-sm" id="card_request" method="POST">


    <section class="flex flex-col mx-44 rounded-xl p-10 outline outline-slate-500 transition ease-in-out">
        <div class="grid grid-cols-1 lg:grid-cols-5 lg:gap-5 space-y-2">

            <label for="image"
                   class="w-full flex flex-col items-center justify-center outline outline-gray-400 hover:outline-green-300 p-3 mt-5 rounded cursor-pointer col-span-1 align-self-center justify-self-center">
            <span class="flex flex-col items-center justify-center">
                <img src="<?= base_url() ?>/assets/images/upload_logo.png" class="w-12 opacity-50" alt="">
                <p class="text-gray-400 font-medium mt-2">Bild hinzufügen</p>
            </span>
                <input type="file" id="student_image" class="hidden">
            </label>
            <div class="md:col-span-4 col-span-1 flex flex-col gap-3">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="" class="font-semibold text-gray-500">Vorname</label>
                        <input class="bg-slate-800 text-white focus:outline focus:outline-green-300 rounded p-3"
                               type="text" id="student_firstname"></div>
                    <div class="flex flex-col gap-2">
                        <label for="" class="font-semibold text-gray-500">Nachname</label>
                        <input type="text" id="student_lastname"
                               class="bg-slate-800 text-white focus:outline focus:outline-green-300 rounded p-3">
                    </div>

                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="" class="font-semibold text-gray-500">Geburtsdatum</label>
                        <input type="date" id="student_birthdate"
                               class="bg-slate-800 text-white focus:outline focus:outline-green-300 rounded p-3">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="" class="font-semibold text-gray-500">Wohnort</label>
                        <input type="text" id="student_residence"
                               class="bg-slate-800 text-white focus:outline focus:outline-green-300 rounded p-3">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="flex mx-44 items-center my-4 gap-5">
        <div class="h-10 flex items-center justify-center w-10 rounded rounded-full outline outline-green-500 text-white font-xl font-bold">
            2
        </div>
        <p class="text-xl font-semibold text-white">Ihre Kontaktinformationen</p></div>
    <section
            class="flex flex-col mx-44 outline outline-slate-500 rounded-xl p-10 hover:outline hover:outline-green-300 transition ease-in-out ">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="flex flex-col gap-2">
                <label for="" class="font-semibold text-gray-500">Name</label>
                <input class="bg-slate-800 text-white focus:outline focus:outline-green-300 rounded p-3" type="text" id="parent_name">
            </div>
            <div class="flex flex-col gap-2">
                <label for="" class="font-semibold text-gray-500">E-Mail</label>
                <input class="bg-slate-800 text-white focus:outline focus:outline-green-300 rounded p-3" type="text" id="parent_email">
            </div>
        </div>
    </section>
    <section class="mx-44 flex flex-col mt-10">
<button class="rounded p-4 font-semibold text-white bg-cyan-500 shadow-lg shadow-cyan-500/20">Bestätigen</button>
    </section>
</form>