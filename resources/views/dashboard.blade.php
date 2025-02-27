<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="bg-gray-100">
    <header class="flex justify-between items-center bg-white p-2 shadow-md">
        <h1 class="text-2xl font-bold">USERS PANEL</h1>
        <div class="flex items-center space-x-4 relative m-8">
            <span class="text-gray-700 ">Usuario: {{ auth()->user()->nombre." ".auth()->user()->apellido}} </span>
            
            <!-- Imagen circular -->
            <div class="relative">
                <img src="https://th.bing.com/th/id/OIP.YjAvVDcl5JYNEKBad2m1HgAAAA?rs=1&pid=ImgDetMain" width="200px" height="200px" alt="Usuario" class="w-8 h-8 rounded-full cursor-pointer" id="user-menu-button">
                <!-- Menú desplegable -->
                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                    <div class="py-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Salir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="w-full h-full">
        <dh-component>
            <div class="flex flex-no-wrap">

                <div style="min-height: 90vh"
                    class="w-64 absolute sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex pr-4">
                    <div class="px-8">
                       
                        <ul class="mt-12">
                          
                            <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                    <i class="fas fa-users text-lg"></i> 
                                    <span class="text-sm ml-2">
                                        <h2 class="text-xl font-bold mb-4">Gestión Usuarios</h2>
                                    </span>
                                </a>
                            </li>
                            





                        </ul>
                      
                    </div>
                    
                </div>
                

                <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">

                    <div class="w-full h-full  border-gray-300">
                        @livewire('user-component')
                    </div>
                </div>
            </div>
            <script>



                var sideBar = document.getElementById("mobile-nav");
            var openSidebar = document.getElementById("openSideBar");
            var closeSidebar = document.getElementById("closeSideBar");
            sideBar.style.transform = "translateX(-260px)";

            function sidebarHandler(flag) {
                if (flag) {
                    sideBar.style.transform = "translateX(0px)";
                    openSidebar.classList.add("hidden");
                    closeSidebar.classList.remove("hidden");
                } else {
                    sideBar.style.transform = "translateX(-260px)";
                    closeSidebar.classList.add("hidden");
                    openSidebar.classList.remove("hidden");
                }
            }
            </script>

<script>
   
    const button = document.getElementById('user-menu-button');
    const menu = document.getElementById('user-menu');

    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

  
    window.addEventListener('click', (event) => {
        if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
</script>

        </dh-component>
    </div>
</body>

</html>