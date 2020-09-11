<?php

// TODO: remove function and take generic one
function filterProducts1($products, $filter, $value)
{
    $test = array_filter($products, function ($var) use ($filter, $value) {
        return ($var[$filter] == $value);
    });
    return $test;
}

?>

<div class="mt-16" >

    <h3 class="text-gray-600 text-2xl font-medium mb-3" >Our products</h3 >

    <div x-data="{ tab: 'food' }" >
        <div class="flex -mx-px" >
            <button type="button" x-on:click="tab = 'food'" x-bind:class="{ 'bg-white border-white': tab === 'food' }"
                    class="bg-transparent hover:bg-gray-200 text-gray-700 text-sm md:text-base font-semibold rounded-t focus:outline-none mx-px py-px md:py-2 px-3 md:px-4" >Food
            </button >
            <button type="button" x-on:click="tab = 'drinks'" x-bind:class="{ 'bg-white border-white': tab === 'drinks' }"
                    class="bg-transparent hover:bg-gray-200 text-gray-700 font-semibold rounded-t focus:outline-none mx-px py-2 px-4" > Drinks
            </button >
        </div >

        <ul class="bg-white text-sm rounded-b p-4" >

            <li x-show="tab === 'food'" >

                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6" >

                    <?php foreach (filterProducts1($products, 'category','food') as $product) { ?>

                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden" >
                            <div class="flex items-end justify-end h-56 w-full bg-cover"
                                 style="background-image: url('<?php echo $imagePath . $product['image']; ?>')" >

                                <label for="<?php echo $product['id']; ?>" class="test p-2 rounded-full bg-green-600 text-white mx-5 -mb-4 " >
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" >
                                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" ></path >
                                    </svg >
                                </label >
                                <input type="checkbox" id="<?php echo $product['id']; ?>" name="product[]" value="<?php echo $product['id']; ?>" >


                                <!--                      <button class="p-2 rounded-full bg-green-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500" >-->
                                <!--                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" >-->
                                <!--                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" ></path >-->
                                <!--                        </svg >-->
                                <!--                    </button >-->

                            </div >
                            <div class="px-5 py-3" >
                                <h3 class="text-green-700 uppercase" ><?php echo $product['name']; ?></h3 >
                                <span class="text-gray-500 mt-2" ><?php echo $product['price'] . 'eur'; ?></span >
                            </div >
                        </div >

                    <?php } ?>

                </div >

            </li >

            <li x-show="tab === 'drinks'" >

                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6" >
                    <?php foreach (filterProducts1($products, 'category','drink') as $product) { ?>

                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden" >
                            <div class="flex items-end justify-end h-56 w-full bg-cover"
                                 style="background-image: url('<?php echo $imagePath . $product['image']; ?>')" >

                                <label for="<?php echo $product['id']; ?>" class="test p-2 rounded-full bg-green-600 text-white mx-5 -mb-4 " >
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" >
                                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" ></path >
                                    </svg >
                                </label >
                                <input type="checkbox" id="<?php echo $product['id']; ?>" name="product[]" value="<?php echo $product['id']; ?>" >


                                <!--                      <button class="p-2 rounded-full bg-green-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500" >-->
                                <!--                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" >-->
                                <!--                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" ></path >-->
                                <!--                        </svg >-->
                                <!--                    </button >-->

                            </div >
                            <div class="px-5 py-3" >
                                <h3 class="text-gray-700 uppercase" ><?php echo $product['name']; ?></h3 >
                                <span class="text-gray-500 mt-2" ><?php echo $product['price'] . 'eur'; ?></span >
                            </div >
                        </div >

                    <?php } ?>
                </div >

            </li >

        </ul >

    </div >


</div >