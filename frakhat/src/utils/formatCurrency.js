export function formatCurrency(number) {
    return  number && Number(number.toFixed(1)).toLocaleString() + " تومان";
};