import {type VariantProps, cva} from 'class-variance-authority'

export {default as SButton} from './SButton.vue'

export const buttonVariants = cva(
    'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50',
    {
        variants: {
            variant: {
                default: 'bg-primary text-primary-foreground hover:bg-primary/90',
                destructive:
                    'bg-destructive text-destructive-foreground hover:bg-destructive/90',
                ghost: 'hover:bg-secondary hover:text-secondary-foreground',
                link: 'text-primary underline-offset-4 hover:underline',

                primary: 'bg-primary stroke-primary-foreground text-primary-foreground hover:bg-primary/90 focus-visible:ring-offset-2 focus-visible:ring-primary rounded-xl font-semibold text-sm min-w-[72px] transition relative',
                secondary: 'bg-secondary font-semibold font-sm stroke-secondary-foreground text-primary hover:bg-secondary-hover focus-visible:ring-offset-2 focus-visible:ring-primary  text-sm rounded-xl min-w-[72px] transition relative',
                outline: 'bg-outline stroke-outline text-outline-foreground hover:bg-outline-hover border focus-visible:ring-offset-2 focus-visible:ring-primary  text-sm rounded-xl min-w-[72px] transition relative',
                accent: 'bg-accent stroke-accent-foreground text-accent-foreground hover:bg-accent-hover focus-visible:ring-offset-2 focus-visible:ring-primary rounded-xl font-semibold text-sm min-w-[72px] transition relative',

            },
            size: {
                default: 'h-10 px-4 py-2',
                sm: 'h-9 rounded-md px-3',
                lg: 'h-11 rounded-md px-8',
                icon: 'h-10 w-10',
            },
        },
        defaultVariants: {
            variant: 'default',
            size: 'default',
        },
    },
)

export type ButtonVariants = VariantProps<typeof buttonVariants>
