<!DOCTYPE html>
<html lang="en" >

<head >
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../index.js" type="module" defer ></script >

    <title >PHP Order form</title >
</head >

<body class="" >


<div class="" >

    <header >

        <div class="container mx-auto px-6 py-3" >
            <div class="flex items-center justify-between" >
                <div class="hidden w-full text-gray-600 md:flex md:items-center" >
                    <span class="mx-1 text-sm" >NY</span >
                </div >
                <div class="w-full text-gray-700 md:text-center text-2xl font-semibold" >
                    Brand
                </div >
                <div class="flex items-center justify-end w-full" >
                    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0" >
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" >
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" ></path >
                        </svg >
                    </button >

                    <div class="flex sm:hidden" >
                        <button @click="isOpen = !isOpen" type="button" class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu" >
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current" >
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" ></path >
                            </svg >
                        </button >
                    </div >
                </div >
            </div >

            <nav class="sm:flex sm:justify-center sm:items-center mt-4" >
                <div class="flex flex-col sm:flex-row" >
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#" >Home</a >
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#" >Shop</a >
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#" >Categories</a >
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#" >Contact</a >
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#" >About</a >
                </div >
            </nav >

        </div >

    </header >


    <main class="my-8" >

        <div class="container mx-auto px-6" >

            <div role="alert" class="mb-3" style="display: <?php echo (isset($_POST['submit'])) ? 'block' : 'none'; ?>" >
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2" > Your order...</div >
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700" >
                    <p >... has reached us. We'll start prepping immediately...</p >
                </div >
            </div >

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" >

                <?php require('form-order.php'); ?>

                <?php require('view-products.php'); ?>

            </form >

        </div >

    </main >


    <footer class="bg-gray-200" >
        <div class="container mx-auto px-6 py-3 flex justify-between items-center" >
            <p class="py-2 text-gray-500 sm:py-0" >You already ordered <?php echo $_SESSION['order-amount-total']; ?>eur.</p >
            <p class="py-2 text-gray-500 sm:py-0" >All rights reserved</p >
        </div >
    </footer >

</div >

</body >

</html >

