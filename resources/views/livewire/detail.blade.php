<div class="fixed z-10 inset-0 overflow-y-auto  ease-out duration-400">
    <div class="flex items-end justify-center max-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            
            <table class="w-full whitespace-no-wrap">
                 <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($isiDetail as $row)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                           
                                <div>
                                    <p class="font-semibold"><?= $row['name']?></p>
                                    <!-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                        10x Developer
                                    </p> -->
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                           
                                <div>
                                    <p class="font-semibold"><?= $row['katerangan']?></p>
                                    <!-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                        10x Developer
                                    </p> -->
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>    

        </div>
        <span class="mt-3 mb-3 mr-5 ml-5 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="closeDetailPopover()" type="button"
                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Close
            </button>
        </span>
    </div>
</div>