<div class="flex flex-wrap -mx-3 mb-6" >

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >
        <label for="name-first" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >First Name</label >
        <input type="text" id="name-first" name="name-first" value="<?php echo $nameFirst; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($nameFirstError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $nameFirstError; ?>
    </div >

    <div class="w-full md:w-1/2 px-3" >
        <label for="name-last" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Last Name</label >
        <input type="text" id="name-last" name="name-last" value="<?php echo $nameLast; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($nameLastError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $nameLastError; ?>
    </div >

</div >

<div class="flex flex-wrap -mx-3 mb-6" >
    <div class="w-full px-3" >
        <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" > Email </label >
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($emailError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $emailError; ?>
    </div >
</div >

<div class="flex flex-wrap -mx-3 mb-6" >

    <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0" >
        <label for="address-street" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Street</label >
        <input type="text" id="address-street" name="address-street" value="<?php echo $addressStreet; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($addressStreetError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $addressStreetError; ?>
    </div >

    <div class="w-full md:w-1/3 px-3" >
        <label for="address-number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Number</label >
        <input type="number" id="address-number" name="address-number" value="<?php echo $addressNumber; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($addressNumberError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $addressNumberError; ?>
    </div >

</div >

<div class="flex flex-wrap -mx-3 mb-6" >

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0" >
        <label for="address-zip" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Zip</label >
        <input type="text" id="address-zip" name="address-zip" value="<?php echo $addressZip; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($addressZipError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $addressZipError; ?>
    </div >

    <div class="w-full md:w-2/3 px-3" >
        <label for="address-city" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >City</label >
        <input type="text" id="address-city" name="address-city" value="<?php echo $addressCity; ?>"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($addressCityError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
        <?php echo $addressCityError; ?>
    </div >

</div >

<div class="flex flex-wrap -mx-3 mb-2" >

    <div class="w-full px-3 text-center" >
        <button type="submit" id="submit" name="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Order
        </button >
    </div >

</div >

