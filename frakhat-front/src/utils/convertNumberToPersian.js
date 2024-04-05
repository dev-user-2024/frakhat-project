export function convertNumberToPersian(number) {
    return Number(number).toLocaleString('fa', { useGrouping: false });
}