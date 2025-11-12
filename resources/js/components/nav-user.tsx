import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import {
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
  useSidebar,
} from '@/components/ui/sidebar';
import { UserInfo } from '@/components/user-info';
import { UserMenuContent } from '@/components/user-menu-content';
import { useIsMobile } from '@/hooks/use-mobile';
import { type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/react';
import { ChevronsUpDown } from 'lucide-react';

export function NavUser() {
  const { auth } = usePage<SharedData>().props as any;
  const user = auth?.user ?? null;
  const { state } = useSidebar();
  const isMobile = useIsMobile();

  if (!user) {
    return (
      <SidebarMenu>
        <SidebarMenuItem>
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <SidebarMenuButton
                size="lg"
                className="group text-sidebar-accent-foreground data-[state=open]:bg-sidebar-accent"
                data-test="sidebar-menu-button"
              >
                <div className="flex items-center gap-3">
                  <div className="h-8 w-8 rounded-full bg-zinc-700 flex items-center justify-center text-xs">
                    G
                  </div>
                  <div className="grid text-left text-sm leading-tight">
                    <span className="truncate font-medium">Vendég</span>
                    <span className="truncate text-xs text-muted-foreground">
                      Nem vagy bejelentkezve
                    </span>
                  </div>
                  <ChevronsUpDown className="ml-auto size-4" />
                </div>
              </SidebarMenuButton>
            </DropdownMenuTrigger>

            <DropdownMenuContent
              className="w-(--radix-dropdown-menu-trigger-width) min-w-56 rounded-lg p-2"
              align="end"
              side={isMobile ? 'bottom' : state === 'collapsed' ? 'left' : 'bottom'}
            >
              <div className="flex flex-col gap-2">
// vendég dropdownban:
<Link href="/login" className="rounded-md px-3 py-2 text-sm hover:bg-zinc-800/60">Belépés</Link>
<Link href="/register" className="rounded-md px-3 py-2 text-sm hover:bg-zinc-800/60">Regisztráció</Link>
              </div>
            </DropdownMenuContent>
          </DropdownMenu>
        </SidebarMenuItem>
      </SidebarMenu>
    );
  }

  return (
    <SidebarMenu>
      <SidebarMenuItem>
        <DropdownMenu>
          <DropdownMenuTrigger asChild>
            <SidebarMenuButton
              size="lg"
              className="group text-sidebar-accent-foreground data-[state=open]:bg-sidebar-accent"
              data-test="sidebar-menu-button"
            >
              <UserInfo user={user} />
              <ChevronsUpDown className="ml-auto size-4" />
            </SidebarMenuButton>
          </DropdownMenuTrigger>

          <DropdownMenuContent
            className="w-(--radix-dropdown-menu-trigger-width) min-w-56 rounded-lg"
            align="end"
            side={isMobile ? 'bottom' : state === 'collapsed' ? 'left' : 'bottom'}
          >
            <UserMenuContent user={user} />
          </DropdownMenuContent>
        </DropdownMenu>
      </SidebarMenuItem>
    </SidebarMenu>
  );
}
