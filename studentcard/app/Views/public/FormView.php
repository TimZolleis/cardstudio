<section class="mx-32 mt-5">
    <div>
        <h1 class="text-white font-karla text-4xl font-bold">Einen Schülerausweis beantragen</h1>
        <p class="text-white font-karla">Hier können Sie den Schülerausweis ihres Kindes einfach online beantragen. </p>
    </div>


    <form action="" method="post">
        <section class="mt-10">

            <div class="grid grid-cols-2 w-full gap-16">

                <div class="flex items-center gap-6">
                    <div>
                        <h1 class="text-3xl font-bold font-karla text-white">Informationen ihres Kindes</h1>
                        <p class="text-white font-karla">
                            Zur Erstellung eines Schülerausweises werden folgende Informationen über ihr Kind benötigt:
                        </p>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-5 w-full">

                    <div class="flex flex-col gap-1">
                        <label for="firstname" class="text-white font-karla">Vorname*</label>
                        <input type="text" name="student_firstname" id="student_firstname"
                               class="border border-card-blue rounded p-3 px-5 bg-transparent text-white font-karla">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="firstname" class="text-white font-karla">Nachname*</label>
                        <input type="text" name="student_lastname" id="student_lastname"
                               class="border border-card-blue rounded p-3 px-5 bg-transparent text-white font-karla">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="firstname" class="text-white font-karla">Geburtsdatum*</label>
                        <input type="date" name="student_birthdate" id="student_birthdate"
                               class="border border-card-blue rounded p-3 px-5 bg-transparent text-white font-karla">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="firstname" class="text-white font-karla">Wohnort*</label>
                        <input type="text" name="student_residence" id="student_residence"
                               class="border border-card-blue rounded p-3 px-5 bg-transparent text-white font-karla">
                    </div>

                </div>
                <div class="flex items-center gap-6">
                    <div>
                        <h1 class="text-3xl font-bold font-karla text-white">Ihre Kontaktinformationen</h1>
                        <p class="text-white font-karla">
                            Wir benötigen ihre Kontaktinformationen, um Sie über den Fortschritt ihres Antrages zu
                            informieren oder eventuelle Rückfragen zu stellen.
                            Wenn ihr Ausweis abholbereit ist, werden Sie hierrüber ebenfalls benachrichtigt.
                        </p>
                    </div>
                </div>


                <div class="flex flex-col items-center">
                    <div class="grid grid-cols-2 gap-5 w-full">
                        <div class="flex flex-col gap-1">
                            <label for="firstname" class="text-white font-karla">Name*</label>
                            <input type="text" name="parent_name" id="parent_name"
                                   class="border border-blue-500 rounded p-3 px-5 bg-transparent text-white font-karla">
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="firstname" class="text-white font-karla">E-Mail*</label>
                            <input type="text" name="parent_email" id="parent_email"
                                   class="border border-blue-500 rounded p-3 px-5 bg-transparent text-white font-karla">
                        </div>
                    </div>
                    <button class="bg-card-blue px-20 py-5 text-white font-karla font-bold rounded mt-10" type="submit">Absenden</button>
                </div>

            </div>

            <div class="flex">

            </div>


        </section>

    </form>
</section>