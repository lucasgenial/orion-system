import $ from 'jquery';
import DataTable from 'datatables.net-dt';

declare global {
    interface Window {
        $: typeof $;
        jQuery: typeof $;
    }
}

window.$ = $;
window.jQuery = $;

const queryAll = <T extends Element>(selector: string, root: ParentNode = document): T[] => {
    return Array.from(root.querySelectorAll<T>(selector));
};

const toggleSidebar = (open: boolean): void => {
    const sidebar = document.querySelector<HTMLElement>('[data-orion-sidebar]');
    const overlay = document.getElementById('orion-sidebar-overlay');

    if (!sidebar || !overlay) {
        return;
    }

    sidebar.classList.toggle('is-open', open);
    overlay.classList.toggle('is-open', open);
    document.body.classList.toggle('sidebar-open', open);
};

const initializeSidebar = (): void => {
    queryAll<HTMLElement>('[data-sidebar-open]').forEach((button) => {
        if (button.dataset.bound === 'true') {
            return;
        }

        button.dataset.bound = 'true';
        button.addEventListener('click', () => toggleSidebar(true));
    });

    queryAll<HTMLElement>('[data-sidebar-close]').forEach((button) => {
        if (button.dataset.bound === 'true') {
            return;
        }

        button.dataset.bound = 'true';
        button.addEventListener('click', () => toggleSidebar(false));
    });

    const overlay = document.getElementById('orion-sidebar-overlay');

    if (overlay && overlay.dataset.bound !== 'true') {
        overlay.dataset.bound = 'true';
        overlay.addEventListener('click', () => toggleSidebar(false));
    }
};

const initializeMockPanels = (): void => {
    queryAll<HTMLElement>('[data-bar-width]').forEach((element) => {
        const value = Number(element.dataset.barWidth ?? 0);
        element.style.width = `${Math.max(4, Math.min(100, value))}%`;
    });
};

const initializeDataTables = (): void => {
    queryAll<HTMLTableElement>('.admin-table').forEach((table) => {
        if (table.dataset.datatableBound === 'true') {
            return;
        }

        table.dataset.datatableBound = 'true';

        const headers = queryAll<HTMLTableCellElement>('thead th', table);
        const actionIndex = headers.findIndex((header) => header.textContent?.trim().toLowerCase() === 'ações');

        new DataTable(table, {
            paging: true,
            pagingType: 'simple_numbers',
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            info: true,
            ordering: true,
            autoWidth: false,
            order: [],
            columnDefs: actionIndex >= 0 ? [{ targets: actionIndex, orderable: false, searchable: false }] : [],
            language: {
                decimal: ',',
                emptyTable: 'Nenhum registro disponível',
                info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                infoEmpty: 'Mostrando 0 a 0 de 0 registros',
                infoFiltered: '(filtrado de _MAX_ registros)',
                lengthMenu: 'Exibir _MENU_ registros',
                loadingRecords: 'Carregando...',
                processing: 'Processando...',
                search: 'Buscar:',
                zeroRecords: 'Nenhum registro encontrado',
                paginate: {
                    first: 'Primeiro',
                    last: 'Último',
                    next: 'Próxima',
                    previous: 'Anterior',
                },
            },
            dom: '<"admin-datatable-toolbar"lf>rt<"admin-datatable-footer"ip>',
        });
    });
};

const positionDropdown = (toggle: HTMLElement, menu: HTMLElement): void => {
    const rect = toggle.getBoundingClientRect();
    const viewportWidth = window.innerWidth;
    const menuWidth = Math.max(menu.offsetWidth || 0, rect.width, 180);
    const left = Math.max(12, Math.min(rect.right - menuWidth, viewportWidth - menuWidth - 12));

    menu.style.top = `${rect.bottom + 8}px`;
    menu.style.left = `${left}px`;
    menu.style.minWidth = `${Math.max(rect.width, 180)}px`;
};

const closeDropdowns = (): void => {
    queryAll<HTMLElement>('[data-dropdown-root]').forEach((wrapper) => {
        const menu = wrapper.querySelector<HTMLElement>('[data-dropdown-menu]');
        const toggle = wrapper.querySelector<HTMLElement>('[data-dropdown-toggle]');

        if (!menu || !toggle) {
            return;
        }

        menu.setAttribute('hidden', 'hidden');
        menu.style.removeProperty('top');
        menu.style.removeProperty('left');
        menu.style.removeProperty('min-width');
        wrapper.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
    });
};

const initializeDropdowns = (): void => {
    closeDropdowns();

    queryAll<HTMLElement>('[data-dropdown-root]').forEach((wrapper) => {
        const toggle = wrapper.querySelector<HTMLElement>('[data-dropdown-toggle]');
        const menu = wrapper.querySelector<HTMLElement>('[data-dropdown-menu]');

        if (!toggle || !menu || toggle.dataset.dropdownBound === 'true') {
            return;
        }

        toggle.dataset.dropdownBound = 'true';

        toggle.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            const isOpen = wrapper.classList.contains('is-open');

            closeDropdowns();

            if (!isOpen) {
                wrapper.classList.add('is-open');
                menu.removeAttribute('hidden');
                toggle.setAttribute('aria-expanded', 'true');
                requestAnimationFrame(() => positionDropdown(toggle, menu));
            }
        });

        menu.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    });

    if (document.body.dataset.dropdownDocumentBound !== 'true') {
        document.body.dataset.dropdownDocumentBound = 'true';

        document.addEventListener('click', () => {
            closeDropdowns();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeDropdowns();
            }
        });

        window.addEventListener('resize', () => {
            closeDropdowns();
        });

        window.addEventListener(
            'scroll',
            () => {
                closeDropdowns();
            },
            true,
        );

        document.querySelector<HTMLElement>('.orion-content')?.addEventListener('scroll', () => {
            closeDropdowns();
        });
    }
};

const initializeUserMenu = (): void => {
    const userMenu = document.querySelector<HTMLDetailsElement>('.admin-user-menu');

    if (!userMenu || userMenu.dataset.bound === 'true') {
        return;
    }

    userMenu.dataset.bound = 'true';

    document.addEventListener('click', (event) => {
        if (!userMenu.contains(event.target as Node)) {
            userMenu.removeAttribute('open');
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            userMenu.removeAttribute('open');
        }
    });
};

const initializeApp = (): void => {
    initializeSidebar();
    initializeMockPanels();
    initializeDataTables();
    initializeDropdowns();
    initializeUserMenu();
};

if (document.readyState === 'loading') {
    window.addEventListener('DOMContentLoaded', initializeApp);
} else {
    initializeApp();
}
