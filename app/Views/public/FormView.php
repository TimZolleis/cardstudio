
<section class="mx-8 mt-5 dark:text-white">

    <section class=" font-karla space-y-3">
        <h1 class="text-2xl font-bold">Einen Schülerausweis beantragen</h1>
        <p>Hier können Sie den Schülerausweis ihres Kindes einfach online beantragen. </p>
    </section>

        <?=form_open_multipart(base_url('apply'), array('id' => 'form','name' => 'card_request')) ?>
        <section class="mt-5 font-karla">
            <div>
                <div class="flex items-center font-bold text-xl gap-3">
                    <div class="border flex items-center justify-center border-white rounded-full h-9 w-9">
                        <p>1</p>
                    </div>
                    <p>Informationen ihres Kindes</p>
                </div>
                <p class="mt-3 leading-5 text-sm">Zur Erstellung eines Schülerausweises werden folgende
                    Informationen
                    über ihr Kind benötigt:</p>
            </div>
            </div>
            <section class="grid grid-cols-1 mt-5 gap-2 md:grid-cols-2 lg:grid-cols-4">

                <label for="image"
                       class="w-full flex flex-col items-center justify-center outline outline-gray-400 hover:outline-green-300 p-3 mt-5 rounded cursor-pointer col-span-1 align-self-center md:col-span-2 lg:col-span-4 justify-self-center">
            <span class="flex flex-col items-center justify-center">
                <img src="<?= base_url() ?>/assets/images/upload_logo.png" class="w-12 opacity-50" alt="">
                <p class="text-gray-400 font-medium mt-2">Bild hinzufügen</p>
            </span>
                    <input type="file" id="student_image" name="student_image" class="">
                </label>

                <div class="flex flex-col ">
                    <label for="student_firstname">Vorname*</label>
                    <input type="text" id="student_firstname" name="student_firstname"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                    <p class="text-xs text-red-500 mt-2" id="student_firstname-error" hidden><?= lang("form.errors.student_firstname") ?></p>
                </div>

                <div class="flex flex-col">
                    <label for="student_lastname">Nachname*</label>
                    <input type="text" id="student_lastname" name="student_lastname"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                    <p class="text-xs text-red-500 mt-2" id="student_lastname-error" hidden><?= lang("form.errors.student_lastname") ?></p>
                </div>

                <div class="flex flex-col">
                    <label for="student_birthdate">Geburtsdatum*</label>
                    <input type="date" id="student_birthdate" name="student_birthdate"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                    <p class="text-xs text-red-500 mt-2" id="student_birthdate-error" hidden><?= lang("form.errors.student_birthdate") ?></p>
                </div>

                <div class="flex flex-col">
                    <label for="student_residence">Wohnort*</label>
                    <input type="text" id="student_residence" name="student_residence"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                    <p class="text-xs text-red-500 mt-2" id="student_residence-error" hidden><?= lang("form.errors.student_residence") ?></p>
                </div>

                <button class="bg-card-blue rounded p-3 mt-3 md:hidden" type="button"
                        onclick="document.getElementById('section2').scrollIntoView()">Nächster Schritt
                </button>
            </section>
        </section>

        <section class="mt-5 font-karla">
            <div>
                <div class="flex items-center font-bold text-xl gap-3">
                    <div class="border flex items-center justify-center border-white rounded-full h-9 w-9">
                        <p>2</p>
                    </div>
                    <p>Ihre Kontaktinformationen</p>
                </div>
                <p class="mt-3 leading-5 text-sm">Wir benötigen ihre Kontaktinformationen, um Sie über den Fortschritt
                    ihres
                    Antrages zu informieren oder eventuelle Rückfragen zu stellen.
                    Wenn ihr Ausweis abholbereit ist, werden Sie hierrüber ebenfalls benachrichtigt.</p>
            </div>
            <section class="grid grid-cols-1 mt-5 gap-2 md:grid-cols-2" id="section2">

                <div class="flex flex-col">
                    <label for="parent_name">Name*</label>
                    <input type="text" id="parent_name" name="parent_name"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none" value="<?= set_value('parent_name')?>">
                    <p class="text-xs text-red-500 mt-2" id="parent_name-error" hidden><?= lang("form.errors.parent_name") ?></p>
                </div>

                <div class="flex flex-col">
                    <label for="parent_email">Email*</label>
                    <input type="text" id="parent_email" name="parent_email"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none" value="<?= set_value('parent_email')?>">
                    <p class="text-xs text-red-500 mt-2" id="parent_email-error" hidden><?= lang("form.errors.parent_email") ?></p>
                </div>

                <button class="bg-card-blue rounded p-3 mt-5 md:col-span-2" type="submit" id="button">Absenden</button>

            </section>


        </section>
    <?=form_close()?>

    <div class="text-red-500 outline-red-500"> </div>

</section>