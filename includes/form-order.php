<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w-full max-w-lg" >

    <div class="flex flex-wrap -mx-3 mb-6" >

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >
            <label for="name-first" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >First Name</label >
            <input type="text" id="name-first" name="name-first"
                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" >
            <p class="text-red-500 text-xs italic" >Please fill out this field.</p >
        </div >

        <div class="w-full md:w-1/2 px-3" >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name-last" >
                Last Name
            </label >
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   id="name-last" name="name-last" type="text" placeholder="Doe" >
        </div >

    </div >

    <div class="flex flex-wrap -mx-3 mb-6" >
        <div class="w-full px-3" >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password" >
                Email
            </label >
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   id="grid-email" type="email" name="email" placeholder="name@domain.com" >
            <p class="text-gray-600 text-xs italic" >Make it as long and as crazy as you'd like</p >
        </div >
    </div >

    <div class="flex flex-wrap -mx-3 mb-6" >

        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0" >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address-street" >Street</label >
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="address-street"
                   name="address-street"
                   type="text" placeholder="" >
            <p class="text-red-500 text-xs italic" >Please fill out this field.</p >
        </div >

        <div class="w-full md:w-1/3 px-3" >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address-number" >Number</label >
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   id="address-number" name="address-number" type="number" placeholder="" >
            <p class="text-red-500 text-xs italic" >Please fill out this field.</p >
        </div >

    </div >

    <div class="flex flex-wrap -mx-3 mb-6" >

        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0" >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address-zip" >Zip</label >
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="address-zip"
                   name="address-zip"
                   type="text" placeholder="" >
            <p class="text-red-500 text-xs italic" >Please fill out this field.</p >
        </div >

        <div class="w-full md:w-2/3 px-3" >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address-city" >City</label >
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   id="address-city" name="address-city" type="text" placeholder="" >
            <p class="text-red-500 text-xs italic" >Please fill out this field.</p >
        </div >

    </div >

    <div class="flex flex-wrap -mx-3 mb-2" >
        <div class="w-full px-3 text-center" >
            <button id="submit" type="submit" name="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Order
            </button >
        </div >
    </div >

</form >