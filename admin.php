<div class="mt-4 -mb-3 md:w-3/4 mx-auto">
    <div class="not-prose relative bg-slate-50 rounded overflow-hidden dark:bg-slate-800/25">
        <div style="background-position:10px 10px" class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"></div>
        <div class="relative rounded overflow-auto">
            <div class="shadow-sm overflow-auto my-8">
                <table class="border-collapse table-auto w-full text-sm text-center">
                    <thead>
                        <tr>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200">Usuario</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200">Correo</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200">Eliminado</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200">Rol</th>
                            <!-- <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200">Password</th> -->
                            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200">Creado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                        <?php if ($q->num_rows > 0) :
                            while ($f = $q->fetch_assoc()) :
                                echo '<tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">' . $f['username'] . '</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">' . $f['email'] . '</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">' . $f['is_deleted'] . '</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">' . $f['is_admin'] . '</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">' . $f['created_at'] . '</td>
                                </tr>';
                            endwhile;
                        else:
                            echo '<tr>
                            <td col="5" class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">No hay usuarios registrados</td>
                            </tr>';
                        endif ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
    </div>
</div>