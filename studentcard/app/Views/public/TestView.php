<section class="mx-8 mt-5 dark:text-white">

    <section class=" font-karla space-y-3">
        <h1 class="text-2xl font-bold">Einen Schülerausweis beantragen</h1>
        <p>Hier können Sie den Schülerausweis ihres Kindes einfach online beantragen. </p>
    </section>

    <form action="" name="card_request" id="form">
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
            <section class="grid grid-cols-1 mt-5 gap-2 md:grid-cols-2">

                <div class="flex flex-col ">
                    <label for="firstname">Vorname*</label>
                    <input type="text" id="student_firstname" name="student_firstname"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                </div>

                <div class="flex flex-col">
                    <label for="lastname">Nachname*</label>
                    <input type="text" id="student_lastname" name="student_lastname"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                </div>

                <div class="flex flex-col">
                    <label for="firstname">Geburtsdatum*</label>
                    <input type="date" id="student_birthdate" name="student_birthdate"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                </div>

                <div class="flex flex-col">
                    <label for="firstname">Wohnort*</label>
                    <input type="text" id="student_residence" name=student_residence"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                </div>

                    <button class="bg-card-blue rounded p-3 mt-3 md:hidden" type="button" onclick="document.getElementById('section2').scrollIntoView()">Nächster Schritt</button>
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
                    <label for="firstname">Name*</label>
                    <input type="text" id="parent_name" name="parent_name"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                </div>

                <div class="flex flex-col">
                    <label for="lastname">Email*</label>
                    <input type="text" id="parent_email" name="parent_email"
                           class="border border-card-blue px-3 py-2 rounded bg-transparent focus:outline-none">
                </div>

                <button class="bg-card-blue rounded p-3 mt-5 md:col-span-2" type="submit" id="button">Absenden</button>

            </section>


        </section>
    </form>

</section>