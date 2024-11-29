<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <h3 class="text-xl font-semibold text-black dark:text-white">New Today</h3>
    <!-- New Patients Card -->
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
        <h3 class="text-xl font-semibold text-black dark:text-white">New Patients : {{ $newPatientsCount }}</h3>
        <p class="text-gray-600 dark:text-gray-300">Number of patients added in the last month</p>
        <h3 class="text-xl font-semibold text-black dark:text-white">Males : {{ $malesCount }}</h3>
        <p class="text-gray-600 dark:text-gray-300">Number of male patients</p>
        <h3 class="text-xl font-semibold text-black dark:text-white">Females : {{ $femalesCount }}</h3>
        <p class="text-gray-600 dark:text-gray-300">Number of female patients</p>
        <h3 class="text-xl font-semibold text-black dark:text-white">Egyptians : {{ $egyptiansCount }}</h3>
        <p class="text-gray-600 dark:text-gray-300">Number of Egyptian patients</p>
        <h3 class="text-xl font-semibold text-black dark:text-white">Non-Egyptians : {{ $nonEgyptiansCount }}</h3>
        <p class="text-gray-600 dark:text-gray-300">Number of non-Egyptian patients</p>
    </div>
</div>